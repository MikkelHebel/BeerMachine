<x-app>
    <x-navigation-bar></x-navigation-bar>

    <div>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
   target="_blank" rel="external nofollow">
      Safe link
      </a>

    </div>
    <html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beer Machine Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fff;
      padding: 2rem;
      display: flex;
      gap: 2rem;
    }

    .card {
      border: 1px solid #aaa;
      border-radius: 10px;
      padding: 1.5rem;
      width: 350px;
      position: relative;
    }

    .card h2 {
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .batch-id {
      display: inline-block;
      border: 1px solid #777;
      border-radius: 8px;
      padding: 0.2rem 0.6rem;
      font-weight: bold;
      font-size: 0.9rem;
      margin-left: 0.5rem;
    }

    .beer-icon {
      width: 60px;
      height: 60px;
      background: url('https://example.com/beer-icon.png') no-repeat center center;
      margin-bottom: 0.5rem;
    }

    .label {
      color: #333;
      font-weight: bold;
      margin-top: 0.5rem;
    }

    .value-box {
      border: 1px solid #777;
      border-radius: 8px;
      height: 25px;
      width: 120px;
      margin-bottom: 0.5rem;
    }

    .queue {
      border: 1px solid #aaa;
      border-radius: 10px;
      width: 180px;
      padding: 1rem;
    }

    .queue h3 {
      text-align: center;
      font-size: 0.95rem;
      border-bottom: 1px solid #aaa;
      margin-bottom: 1rem;
      padding-bottom: 0.3rem;
    }

    .queue-item {
      font-size: 0.9rem;
      color: #333;
      border-bottom: 1px solid #ddd;
      padding: 0.4rem 0;
    }

    .queue-item:last-child {
      border-bottom: none;
    }
  </style>
</head>
<body>
    
  <!-- Batch info -->
  <div class="card">
    <h2>
      Batch ID <span class="batch-id">base</span>
    </h2>
    <div class="beer-icon"></div>
    <p>Type</p>

    <div class="label">Batch size</div>
    <div class="value-box"></div>

    <div class="label">Brewed</div>
    <div class="value-box"></div>

    <div class="label">Failed</div>
    <div class="value-box"></div>

    <div class="label">Ratio</div>
    <div class="value-box"></div>
  </div>

  <!-- Queue panel -->
  <div class="queue">
    <h3>Queue</h3>
    <div class="queue-item">Batch: base</div>
    <div class="queue-item">Batch: base</div>
    <div class="queue-item">Batch: base</div>
  </div>
</body>
</x-app>
