<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\tbl_page;
use App\Models\tbl_gallery;
use Illuminate\Http\Exceptions\PostTooLargeException;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageEditController extends Controller
{

    public function editPage($pageName)
    {
        session()->start();
        if($pageName == 'Gallery'){
            $gallery = tbl_gallery::all();
            return view('page.superadmin.editGallery.editGallery',['gallery' => $gallery]);
        }else{
            $page = tbl_page::where('pageName', $pageName)->first();
            $pagePath = $page->pagePath;
            $view = view($pagePath);
            $fileContents = $view->render();
            $editableContent = $this->generateEditableHTML($fileContents);
            $wrappedContent = $editableContent;
            return view('page.editPage', ['editableContent' => $wrappedContent,'pageName' => $pageName]);
        }

    }

    public function generateEditableHTML($content)
    {
        // Match all HTML opening tags
        $pattern = '/<([a-zA-Z]+)([^>]*)>/';
    
        // Replace each opening tag with the same tag and the contenteditable attribute added
        $editableContent = preg_replace($pattern, '<$1$2 contenteditable="true">', $content);
    
        // Replace <a><img> tags with <img> tags only
        $editableContent = preg_replace('/<a[^>]*><img([^>]*)><\/a>/', '<img$1>', $editableContent);

        // Remove the "fixed-top" class from the generated HTML
        $editableContent = str_replace('fixed-top', '', $editableContent);
    
        return $editableContent;
    }
    

    public function saveEdit(Request $request, $pageName)
    {
        $page = tbl_page::where('pageName', $pageName)->first();
        // Get the path of the original file
        $originalFilePath = resource_path('views/' . str_replace('.', '/', $page->pagePath) . '.blade.php');
    
        // Create a backup file by appending a timestamp to the original file name
        $backupFilePath = resource_path('views/' . str_replace('.', '/', $page->pagePath) . '_backup' . '.blade.php');
    
        // Copy the original file to the backup file
        File::copy($originalFilePath, $backupFilePath);
    
        // Get the updated HTML content from the request
        $updatedContent = $request->input('updatedContent');

        // Handle the uploaded image file
        $image = $request->file('images');

    if ($image) {
        // Check if the file size exceeds the limit (2MB)
        if ($image->getSize() > 2 * 1024 * 1024) {
            // Handle the file size limit exceeded error
            return redirect()->back()->with('error', 'The uploaded image file exceeds the maximum allowed size of 2MB.');
        }

        // Move the uploaded image file to the desired directory using a unique filename
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('resources/Img'), $imageName);

        // Get the file path for the saved image
        $savedImagePath = '/resources/Img/' . $imageName;

        // Update the src attribute in the updated content with the new file path
        $pattern = '/<img([^>]*)>/';
        $updatedContent = preg_replace($pattern, '<img src="'.$savedImagePath.'"$1>', $updatedContent);

    }
        $updatedContent = $this->removeContentEditable($updatedContent);
        // Save the updated content to the original file
        File::put($originalFilePath, $updatedContent);
        // dd($updatedContent);

    
        // Redirect to the appropriate page or display a success message
        return redirect()->back()->with('success', 'Page updated successfully.');
    }

    private function removeContentEditable($content)
    {
        // Remove the contenteditable attribute from all elements
        $pattern = '/\s*contenteditable="true"/';
        $updatedContent = preg_replace($pattern, '', $content);
    
        return $updatedContent;
    }
    
    
}
