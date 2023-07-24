<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<style>
    .abc{
        flex-wrap: wrap;
    }
</style>
<div style="text-align: center; background-color: white; height:100%; display:flex; overflow:auto; flex-wrap: wrap;">
    @foreach($pages as $page)
        @if($page->editable == true)
        <a href="{{ route('editPage', ['page' => $page->pageName]) }}" id="page" style="margin:auto;width:300px ; background-color: blue; color: white; text-decoration: none; margin-top: 20px; padding: 10px; border-radius: 20px; display: block;">{{ $page->pageName }}</a><br>
        @endif
    @endforeach
</div>
