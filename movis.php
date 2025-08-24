<?php
// تحميل بيانات الأفلام
$movies = json_decode(file_get_contents(__DIR__ . "/data/movies.json"), true);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>موقع الأفلام</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #0b0e13; /* لون الخلفية */
      color: white;
    }
    header {
      padding: 20px;
      text-align: center;
    }
    .search-box {
      display: flex;
      justify-content: center;
      align-items: center;
      background: white;
      border-radius: 30px;
      max-width: 400px;
      margin: 0 auto;
      padding: 8px 16px;
    }
    .search-box input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 16px;
    }
    .search-box button {
      background: none;
      border: none;
      cursor: pointer;
    }
    .movies {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    .movie-card {
      background: #131a23;
      border-radius: 12px;
      overflow: hidden;
      text-align: center;
      transition: 0.3s;
    }
    .movie-card:hover {
      transform: scale(1.05);
    }
    .movie-card img {
      width: 100%;
      height: 240px;
      object-fit: cover;
    }
    .movie-card h3 {
      margin: 10px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <header>
    <form class="search-box" action="search.php" method="get">
      <input type="text" name="q" placeholder="ابحث عن فيلم...">
      <button type="submit">🔍</button>
    </form>
  </header>

  <main class="movies">
    <?php foreach ($movies as $m): ?>
      <div class="movie-card">
        <a href="movie.php?id=<?= urlencode($m['id']) ?>">
          <img src="<?= htmlspecialchars($m['poster']) ?>" alt="Poster">
          <h3><?= htmlspecialchars($m['title_ar']) ?></h3>
        </a>
      </div>
    <?php endforeach; ?>
  </main>

</body>
</html>
