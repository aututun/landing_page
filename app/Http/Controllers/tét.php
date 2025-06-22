<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Giftcode;
use App\Models\Server;
use App\Models\Money;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon; // Sử dụng Carbon thay vì DateTime để xử lý ngày tháng tốt hơn trong Laravel
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Để sử dụng hệ thống authentication của Laravel
use Illuminate\Support\Facades\Session; // Để quản lý session flash messages
use Illuminate\Support\Str; // Để xử lý chuỗi, ví dụ: tạo slug

// Định nghĩa các hằng số cho các giá trị "magic numbers" để dễ đọc và dễ bảo trì
// Bạn cần điều chỉnh các giá trị này nếu chúng không chính xác với dữ liệu của bạn
define('NEWS_CATEGORY_FOR_SLIDE', 1); // Giả sử Category ID 1 là dành cho tin tức slide
define('DEFAULT_CATEGORY_ID_FOR_COLOR', 1); // ID mặc định cho lớp màu danh mục

class Dashboard extends Controller
{
    protected Category $categoryModel;
    protected Giftcode $giftcodeModel;
    protected Server $serverModel;
    protected Money $moneyModel;
    protected News $newsModel;
    protected User $userModel;

    /**
     * Constructor của Controller.
     * Sử dụng Dependency Injection để tự động khởi tạo các Model.
     * Áp dụng middleware 'auth' để bảo vệ các route CMS.
     */
    public function __construct(
        Category $categoryModel,
        Giftcode $giftcodeModel,
        Server $serverModel,
        Money $moneyModel,
        News $newsModel,
        User $userModel
    ) {
        // Áp dụng middleware 'auth' cho tất cả các phương thức trong controller này.
        // Điều này sẽ tự động kiểm tra xem người dùng đã đăng nhập hay chưa.
        // Nếu chưa, Laravel sẽ tự động chuyển hướng đến trang login.
        // Bạn có thể tùy chỉnh nếu có các route không yêu cầu đăng nhập:
        // $this->middleware('auth')->except(['getNewsDetailsView', 'getShortenedContext', 'countDay', 'getCategoryColorClass', 'getListNewsMenu', 'getListSlide', 'getListCategoriesMenu', 'getRandomNews', 'getListNewsByCategories', 'getListCategoriesAndPostMenu']);
        $this->middleware('auth');

        $this->categoryModel = $categoryModel;
        $this->giftcodeModel = $giftcodeModel;
        $this->serverModel = $serverModel;
        $this->moneyModel = $moneyModel;
        $this->newsModel = $newsModel;
        $this->userModel = $userModel;
    }

    /**
     * Phương thức này trở nên dư thừa nếu middleware 'auth' được sử dụng.
     * Nếu người dùng đã đến được đây, nghĩa là họ đã đăng nhập.
     */
    public function checkLogin()
    {
        return view('cms/dashboard');
    }

    /**
     * Lấy danh sách các Server.
     * Đã chuyển thành phương thức instance.
     */
    public function getListServer()
    {
        return $this->serverModel->getListServer();
    }

    /**
     * Lấy lịch sử giao dịch tiền của người dùng hiện tại.
     * Đã chuyển thành phương thức instance.
     * Sử dụng Auth::id() để lấy ID người dùng đã đăng nhập.
     */
    public function getListMoneyHistory()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại từ hệ thống Auth của Laravel
        if (!$userId) {
            // Trường hợp người dùng chưa đăng nhập hoặc session hết hạn
            return redirect('/login'); // Hoặc xử lý lỗi khác
        }
        $listMoneyHistory = $this->moneyModel->getListMoneyHistory($userId);
        return $listMoneyHistory;
    }

    /**
     * Lấy chi tiết Server và danh sách Server.
     */
    public function getServerDetails($serverID)
    {
        $serverDetails = $this->serverModel->getServerById($serverID);
        $listServer = $this->getListServer(); // Gọi phương thức instance
        return view("cms/listServer", compact('listServer', 'serverDetails'));
    }

    /**
     * Lấy danh sách file trong một thư mục public.
     * Đã sử dụng Storage Facade để quản lý file an toàn hơn.
     */
    public function getFile($location = 'long_kiem')
    {
        // Lấy danh sách file từ disk 'public'
        // Đảm bảo bạn đã chạy `php artisan storage:link` để tạo symlink
        $files = Storage::disk('public')->files($location);
        $filePath = [];
        foreach ($files as $file) {
            $filePath[] = Storage::disk('public')->url($file); // Lấy URL công khai của file
        }
        return view('cms/listSql', compact('filePath'));
    }

    /**
     * Lấy danh sách Giftcode.
     * Đã chuyển thành phương thức instance.
     */
    public function listGiftCode()
    {
        $giftCode = $this->giftcodeModel->getListGiftCode();
        return view('cms/listGiftCode', compact('giftCode'));
    }

    /**
     * Lấy danh sách tin tức và danh mục.
     */
    public function getListNews()
    {
        $listNews = $this->newsModel->getListNews();
        $listCategories = $this->categoryModel->getListCategories();
        return view('cms/listNews', compact('listNews', 'listCategories'));
    }

    /**
     * Lấy danh sách tin tức cho menu.
     * Nên cân nhắc chuyển ra View Composer hoặc Helper nếu chỉ dùng cho Blade views.
     */
    public function getListNewsMenu(int $limit) // Thêm type hinting
    {
        return $this->newsModel->getListNewsMenu($limit);
    }

    /**
     * Lấy danh sách tin tức cho slide.
     * Nên cân nhắc chuyển ra View Composer hoặc Helper nếu chỉ dùng cho Blade views.
     */
    public function getListSlide()
    {
        return $this->newsModel->getListNewsForSlide();
    }

    /**
     * Lấy danh sách tin tức theo bộ lọc.
     */
    public function getListNewsByFilter(Request $request)
    {
        $filterPublic = $request->input('filterPublic', 'all'); // Sử dụng input() với giá trị mặc định
        $filterCategory = $request->input('filterCategory', 'all');

        $listNews = $this->newsModel->getNewsByFilder($filterPublic, $filterCategory);
        $listCategories = $this->categoryModel->getListCategories();
        return view('cms/listNews', compact('listNews', 'listCategories'));
    }

    /**
     * Lấy danh sách danh mục cho menu.
     * getDictionary() có thể không cần thiết nếu Model trả về Eloquent Collection chuẩn.
     * Nên cân nhắc chuyển ra View Composer hoặc Helper.
     */
    public function getListCategoriesMenu()
    {
        return $this->categoryModel->getListCategories()->getDictionary();
    }

    /**
     * Xóa danh mục.
     */
    public function getDeleteCategory(int $id) // Thêm type hinting
    {
        $result = $this->categoryModel->getDeleteCategory($id);
        $status = $result ? 'success' : 'error';
        Session::flash('statusCategory', $status); // Sử dụng Session Facade
        return redirect()->route('categories.list'); // Cần đặt tên route trong routes/web.php, ví dụ: Route::get('/listCategories', [Dashboard::class, 'getListCategories'])->name('categories.list');
    }

    /**
     * Xóa tin tức.
     */
    public function getDeleteNews(int $id) // Thêm type hinting
    {
        $result = $this->newsModel->getDeleteNews($id);
        $status = $result ? 'success' : 'error';
        Session::flash('statusNews', $status);
        return redirect()->route('news.list'); // Cần đặt tên route, ví dụ: Route::get('/listNews', [Dashboard::class, 'getListNews'])->name('news.list');
    }

    /**
     * Lấy chi tiết tin tức để chỉnh sửa hoặc tạo mới.
     */
    public function getNewsDetails(int $id) // Thêm type hinting
    {
        $listCategories = $this->categoryModel->getAllListCategories()->getDictionary();

        $newsObj = null;
        if ($id !== 0) { // Sử dụng !== để so sánh kiểu dữ liệu
            $newsObj = $this->newsModel->getNewsByIdCms($id);
        }
        return view('cms/editNews', compact('id', 'newsObj', 'listCategories'));
    }

    /**
     * Lấy chi tiết danh mục để chỉnh sửa hoặc tạo mới.
     */
    public function getCategoryDetails(int $id) // Thêm type hinting
    {
        $categoryObj = null;
        if ($id !== 0) {
            $categoryObj = $this->categoryModel->getCategoryById($id);
        }
        return view('cms/editCategory', compact('id', 'categoryObj'));
    }

    /**
     * Lấy danh mục theo ID.
     * Nên cân nhắc chuyển ra View Composer hoặc Helper nếu chỉ dùng cho Blade views.
     */
    public function getCategoryById(int $id) // Thêm type hinting
    {
        return $this->categoryModel->getCategoryById($id);
    }

    /**
     * Lấy class màu cho danh mục.
     * Đây là một hàm tiện ích thuần túy cho view, nên được chuyển ra ngoài Controller.
     * Có thể tạo một Helper, Blade directive hoặc View Composer.
     * Vẫn giữ static vì nó không dùng biến instance nào.
     */
    public static function getCategoryColorClass(int $categoryId = DEFAULT_CATEGORY_ID_FOR_COLOR) // Thêm type hinting và giá trị mặc định
    {
        $colorClasses = ['bg-main-1', 'bg-main-2', 'bg-main-3', 'bg-main-4', 'bg-main-5', 'bg-main-6'];
        $colorIndex = ($categoryId - 1) % count($colorClasses);
        return $colorClasses[$colorIndex];
    }

    /**
     * Hiển thị chi tiết tin tức cho người dùng.
     */
    public function getNewsDetailsView(int $id) // Thêm type hinting
    {
        $newsObj = null;
        if ($id !== 0) {
            $newsObj = $this->newsModel->getNewsById($id);
        }
        return view('main/news', compact('id', 'newsObj'));
    }

    /**
     * Cập nhật chi tiết tin tức (bao gồm upload ảnh).
     */
    public function getUpdateNewsDetails(Request $request)
    {
        $id = $request->input('ID'); // Sử dụng input()
        $status = 'error'; // Mặc định là lỗi

        $newsData = [
            'ID' => $id,
            'Title' => $request->input('Title'),
            'Context' => $request->input('Context'),
            'PublicNews' => $request->input('PublicNews'),
            'Catagory' => $request->input('Category'),
        ];

        // Lấy thông tin tin tức hiện có để xử lý ảnh cũ
        $existingNews = ($id !== 0) ? $this->newsModel->getAllNewsById($id) : null;

        // Xử lý upload ảnh
        if ($request->hasFile('LinkPicture')) {
            $file = $request->file('LinkPicture');
            $categorySlug = Str::slug($request->input('Category', 'uncategorized')); // Tạo slug từ tên danh mục, có giá trị mặc định
            $filename = $categorySlug . '_' . time() . '.' . $file->getClientOriginalExtension(); // Tên file duy nhất
            $storagePath = 'images/news/' . $categorySlug; // Đường dẫn lưu trữ

            // Xóa ảnh cũ nếu đang cập nhật và có ảnh cũ tồn tại
            if ($existingNews && $existingNews->LinkPicture && Storage::disk('public')->exists($existingNews->LinkPicture)) {
                Storage::disk('public')->delete($existingNews->LinkPicture);
            }

            // Lưu ảnh mới vào disk 'public'
            $path = $file->storeAs($storagePath, $filename, 'public');
            $newsData['LinkPicture'] = $path; // Lưu đường dẫn tương đối
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh hiện tại
            $newsData['LinkPicture'] = $request->input('CurrentLinkPicture');
        }

        // Gọi phương thức cập nhật/tạo mới trong Model
        $result = $this->newsModel->getUpdateNews($newsData);

        if ($result) {
            $status = 'success';
        }
        Session::flash('status', $status);
        return redirect()->route('news.edit', ['id' => $id]); // Chuyển hướng về trang chỉnh sửa với route name
    }

    /**
     * Cập nhật chi tiết danh mục.
     */
    public function getUpdateCategoryDetails(Request $request)
    {
        $id = $request->input('ID');
        $status = 'error';

        $categoryData = [
            'ID' => $id,
            'CategoryName' => $request->input('CategoryName'),
        ];

        $result = $this->categoryModel->getUpdateCategory($categoryData);
        if ($result) {
            $status = 'success';
        }
        Session::flash('status', $status);
        return redirect()->route('category.edit', ['id' => $id]); // Chuyển hướng về trang chỉnh sửa với route name
    }

    /**
     * Lấy danh sách danh mục (cho trang CMS).
     */
    public function getListCategories()
    {
        $listCategories = $this->categoryModel->getListCategories()->getDictionary(); // Giả định getDictionary() cần thiết
        return view('cms/listCategories', compact('listCategories'));
    }

    /**
     * Lấy danh sách tin tức theo danh mục.
     */
    public function getListNewsByCategories(int $id) // Thêm type hinting
    {
        $listNewsByCategories = $this->newsModel->getNewsByCategory($id)->getDictionary(); // Giả định getDictionary() cần thiết
        return view('main/categories', compact('listNewsByCategories'));
    }

    /**
     * Lấy danh sách danh mục và bài viết liên quan cho menu (nếu có).
     * Nên cân nhắc chuyển ra View Composer hoặc Helper nếu chỉ dùng cho Blade views.
     */
    public function getListCategoriesAndPostMenu()
    {
        $listCategories = $this->categoryModel->getListCategories();
        $data = [];
        foreach ($listCategories as $category) {
            // Lấy 3 bài viết cho mỗi danh mục
            $data[$category->ID] = $this->newsModel->getNewsByCategory($category->ID, 3)->getDictionary();
        }
        return $data;
    }

    /**
     * Lấy danh sách tin tức ngẫu nhiên.
     * Nên cân nhắc chuyển ra View Composer hoặc Helper nếu chỉ dùng cho Blade views.
     */
    public function getRandomNews()
    {
        // getDictionary() có thể không cần thiết nếu getRandom trả về Eloquent Collection chuẩn
        return $this->newsModel->getRandom(3)->getDictionary();
    }

    /**
     * Format ngày tháng.
     * Đây là một hàm tiện ích thuần túy, nên được chuyển ra Helper.
     * Giữ static vì nó không dùng biến instance nào.
     */
    public static function countDay(string $dateTime): string // Thêm type hinting
    {
        // Sử dụng Carbon thay vì DateTime để tận dụng các tiện ích của Laravel
        $carbonDate = Carbon::parse($dateTime);
        return $carbonDate->format('d-m-Y');
    }

    /**
     * Cắt ngắn nội dung HTML và làm sạch.
     * Đây là một hàm tiện ích thuần túy, nên được chuyển ra Helper.
     * Giữ static vì nó không dùng biến instance nào.
     */
    public static function getShortenedContext(string $string, int $length = 150, string $append = '...'): string // Thêm type hinting
    {
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanHtml = $purifier->purify($string);

        // Cắt chuỗi sau khi loại bỏ thẻ HTML
        $truncatedString = mb_substr(strip_tags($cleanHtml), 0, $length);

        // Thêm dấu ba chấm nếu chuỗi bị cắt
        if (mb_strlen(strip_tags($cleanHtml)) > $length) {
            $truncatedString .= $append;
        }

        return $truncatedString;
    }
}
