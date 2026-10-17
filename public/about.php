<?php
$year = date('Y');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="About Christ Gospel Apostolic Church, our mission, vision, and ministry focus.">
  <title>About CGAC | Christ Gospel Apostolic Church</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/site.css">
</head>
<body>
  <header class="site-header">
    <div class="container nav-wrap">
      <a href="/" class="brand" aria-label="CGAC home">
        <img src="/assets/logo.svg" alt="CGAC logo" class="brand-mark">
        <div class="brand-text">
          <strong>CGAC</strong>
          <span>Christ Gospel Apostolic Church</span>
        </div>
      </a>

      <nav class="main-nav" aria-label="Main navigation">
        <a href="/">Home</a>
        <a href="/about.php">About CGAC</a>
        <a href="/#programmes">Programmes</a>
        <a href="/#watchwords">Annual Watchwords</a>
        <a href="/#sermons">Sermons & Media</a>
        <a href="/#watch-live">Watch Live</a>
        <a href="/#give">Give</a>
        <a href="/#contact">Contact</a>
      </nav>
    </div>
  </header>

  <main class="inner-page">
    <section class="page-hero">
      <div class="container narrow">
        <p class="eyebrow">About CGAC</p>
        <h1>Christ Gospel Apostolic Church</h1>
        <p class="lead">A global ministry committed to the gospel of Christ, disciple-making, prayer, outreach, and spiritual leadership.</p>
      </div>
    </section>

    <section class="section-space">
      <div class="container narrow content-block">
        <h2>Our mission</h2>
        <p>CGAC exists to spread the gospel, nurture believers, and provide a spiritually enriching environment where worship, prayer, and biblical teaching thrive.</p>

        <h2>Our vision</h2>
        <p>To be a Christ-centred church that impacts communities, families, and nations through the power of the Holy Spirit, discipleship, and compassionate service.</p>

        <h2>Our values</h2>
        <ul>
          <li>Faithfulness to the Word of God</li>
          <li>Prayer and spiritual renewal</li>
          <li>Compassion and outreach</li>
          <li>Christian discipleship and leadership development</li>
          <li>Worship that honours God</li>
        </ul>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-grid">
      <div>
        <img src="/assets/logo.svg" alt="CGAC logo" class="footer-logo">
        <h3>CGAC</h3>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li>Location: To be confirmed</li>
          <li>Email: To be confirmed</li>
          <li>Phone: To be confirmed</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p>© <?php echo htmlspecialchars((string) $year); ?> CGAC.</p>
      </div>
    </div>
  </footer>
</body>
</html>
