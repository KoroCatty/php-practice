<!-- Tailwind 使用 -->
<?php
$title = '';
$description = '';
$submitted = false;

// エラーメッセージを格納する配列を用意
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $title = htmlspecialchars($_POST['title'] ?? '');
  $description = htmlspecialchars($_POST['description'] ?? '');

  if (empty($title)) {
    $messages[] = ['text' => 'Title is required', 'color' => 'text-red-500']; // adding to the array
    $submitted = false;
  }
  if (empty($description)) {
    $messages[] = ['text' => 'Description is required', 'color' => 'text-red-500']; // adding to the array
    $submitted = false;
  }


  echo '<pre>';
  var_dump($_FILES);
  echo '</pre>';
  // ⬇︎ Output

  // array(1) {
  //   ["logo"]=>
  //   array(6) {
  //     ["name"]=>
  //     string(42) "Screenshot 2024-04-08 at 10.46.19 am.png"
  //     ["full_path"]=>
  //     string(42) "Screenshot 2024-04-08 at 10.46.19 am.png"
  //     ["type"]=>
  //     string(9) "image/png"
  //     ["tmp_name"]=>
  //     string(14) "/tmp/phpR6Glrx"
  //     ["error"]=>
  //     int(0)
  //     ["size"]=>
  //     int(68348)
  //   }
  // }

  // 一部を抜粋
  $file =  $_FILES['logo'];

  // When successful
  if ($file['error'] === UPLOAD_ERR_OK) {
    echo 'File uploaded successfully' . '<br>';

    // upload directory
    $uploadDir = 'uploads/';

    // create directory with permission 
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    // create file name (randomネームにすること！)
    $filename = uniqid() . '_' . $file['name'];

    // Check file type
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // strtolower() で小文字に変換, pathinfo() でファイルの情報を取得

    // Check if file extension is allowed
    if (in_array($fileExtension, $allowedExtensions)) { // in_array() で配列の中にお目当てのものが含まれているかを確認

      // Upload file  
      if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
        echo 'File uploaded successfully' . $filename . '<br>';
        $messages[] = ['text' => 'File uploaded successfully', 'color' => 'text-green-500']; // adding to messages array
        $submitted = true;
      } else {
        echo 'File upload failed' . $file['error'] . '<br>';
        $messages[] = ['text' => 'File upload failed' . $file['error'], 'color' => 'text-red-500']; // adding to messages array
        $submitted = false;
      }
    } else {
      $messages[] = ['text' => 'File type not allowed'  . implode(', ', $allowedExtensions), 'color' => 'text-red-500']; // adding to messages array
      $submitted = false;
    }
    echo $filename;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Job Listing</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-semibold mb-6">Create Job Listing</h1>

      <?php foreach ($messages as $message): ?>
        <p class="<?= $message['color'] ?>">
          <?= $message['text'] ?></p>
      <?php endforeach; ?>

      <form method="post" enctype="multipart/form-data">
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter job title" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none" value="<?= $title ?>">
        </div>

        <div class="mb-6">
          <label for="description" class="block text-gray-700 font-medium">Description</label>
          <textarea id="description" name="description" placeholder="Enter job description" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"><?= $description ?></textarea>
        </div>

        <div class="mb-4">
          <label for="resume" class="block text-gray-700 font-medium">Logo</label>
          <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
        </div>

        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Create Listing
          </button>
          <a href="#" class="text-blue-500 hover:underline">Back to Listings</a>
        </div>

      </form>

      <!-- Display submitted data -->
      <?php if ($submitted) : ?>
        <div class="mt-6 p-4 border rounded bg-gray-200">
          <h2 class="text-lg font-semibold">Submitted Job Listing:</h2>
          <p><strong>Title:</strong> <?= $title ?></p>
          <p><strong>Description:</strong> <?= $description ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>