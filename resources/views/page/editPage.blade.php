<html>
  <head>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <style>
    footer {
      margin-top: 25%;
      background-color: #212529;
      color: white;
      font-family: "Poppins", sans-serif;
    }
    
    footer a{
      text-decoration: none;
      color: white;
    }


    #editContainer{
      position: relative;
    }
  </style>
  
  <body style="background-color: white; text-align:center;">
<a href="/pageList">Page List</a>

<!-- page.blade.php -->
<form id="editForm" action="{{ route('saveEdit', ['pageName' => $pageName]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div id="editContainer" style="background-color: black; border: 1px solid black; width: 80%; height: 60%; overflow: auto; margin:auto; margin-top:100px;" contenteditable="true">
    {!! $editableContent !!}
  </div>
  <p style="margin: auto;">Maximum Image Size is 2MB</p>
  <button id="saveChanges" type="submit">Save Changes</button>
</form>
<a id="originalBuild" type="submit" href="{{ route('reverseToLastEdition', ['pageName' => $pageName]) }}">Reverse to last build</a>
<script>
  var form = document.getElementById('editForm');
  var divContainer = document.querySelector('div');
  var image = document.querySelector('img');
  var fileInput = null;

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Update the value of the editableContent input field with the HTML content
    var updatedContent = divContainer.innerHTML;
    var updatedContentInput = document.createElement('input');
    updatedContentInput.setAttribute('type', 'hidden');
    updatedContentInput.setAttribute('name', 'updatedContent');
    updatedContentInput.value = updatedContent;
    form.appendChild(updatedContentInput);
    form.submit();

    // Submit the form asynchronously using AJAX
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Success, do something if needed
      } else {
        // Error, handle accordingly
      }
    };
    xhr.onerror = function() {
      // Error, handle accordingly
    };
    xhr.send(formData);
  });

  // Add click event listener to the image
  image.addEventListener('click', function() {
    // Remove the existing file input if it exists
    if (fileInput) {
      fileInput.remove();
    }

    // Show file upload dialog
    fileInput = document.createElement('input');
    fileInput.setAttribute('type', 'file');
    fileInput.setAttribute('name', 'images');
    fileInput.style.display = 'none';
    form.appendChild(fileInput);

    fileInput.click();

    fileInput.addEventListener('change', function(event) {
      var file = event.target.files[0];

      // Check if the file size exceeds the limit (2MB)
      if (file.size > 2 * 1024 * 1024) {
        var errorMessage = 'The uploaded image file "' + file.name + '" exceeds the maximum allowed size of 2MB.';
        var errorSpan = document.createElement('p');
        errorSpan.style.color = 'red';
        errorSpan.textContent = errorMessage;
        form.insertBefore(errorSpan, fileInput);

        // Reset the file input
        fileInput.value = null;
        return;
      }

      // Remove the error message if it exists
      var errorSpan = form.querySelector('p[style="color: red;"]');
      if (errorSpan) {
        errorSpan.remove();
      }

      // Create a new FileReader instance
      var reader = new FileReader();

      // When the file has been read successfully
      reader.onload = function(e) {
        // Create a new image element
        var newImage = document.createElement('img');
        newImage.classList.add('img-fluid', 'rounded-3', 'my-5');

        // Set the source of the new image to the file URL
        newImage.src = e.target.result;

        // Replace the clicked image with the new image
        image.parentNode.replaceChild(newImage, image);

        // Update the file input with the uploaded file
        fileInput = file;
      };

      // Read the file as a data URL
      reader.readAsDataURL(file);
    });
  });
</script>



  </body>
</html>
