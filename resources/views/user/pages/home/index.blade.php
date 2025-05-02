<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Arial', sans-serif;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0 0 10px 10px;
        }
        .header .title {
            font-size: 1.5rem;
        }
        .header .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x400/?event,conference') no-repeat center;
            background-size: cover;
            color: black;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 0 0 20px 20px;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table td a {
            font-weight: bold;
            text-decoration: none;
        }
        .table td a:hover {
            color: #28a745;
        }
        .badge {
            font-size: 0.9em;
            padding: 0.4em 0.6em;
        }
        .user-profile {
            float: right; /* Tetap berada di pojok kanan */
            text-align: center; /* Teks diratakan tengah */
            width: 200px; /* Opsional, untuk memastikan area rata tengah */
        }

    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="title">
            <h1>All In Event</h1>
            <small>Event, Tiket, Merch - All In One</small>
        </div>
        <div class="user-profile">
            <span>
                Selamat Datang {{ $username }} <br>
                Minat: {{ ucfirst($minat) }}
            </span>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero mb-5">
        <h1 class="display-4">Jelajahi Beragam Event</h1>
        <p class="lead">Dari musik hingga budaya, temukan acara yang sesuai dengan minatmu!</p>
    </section>

    <!-- Content Section -->
    <div class="container">
        <h2 class="text-center text-dark mb-4">Daftar Event</h2>

        <div class="mb-4">
            <form method="GET" action="{{ route('event.index') }}" class="d-flex align-items-center gap-3">
                <!-- Dropdown Filter Jenis Event -->
                <select name="filter_jenis" class="form-select" style="width: 200px;">
                    <option value="">Urutkan Berdasarkan Minat (Default)</option>
                    <option value="musik">Musik</option>
                    <option value="keagamaan">Keagamaan</option>
                    <option value="culture">Culture</option>
                    <option value="pameran">Pameran</option>
                    <option value="budaya">Budaya</option>
                </select>

                <!-- Checkbox Filter Rating -->
                <div class="form-check">
                    <input type="checkbox" name="rating_7_up" class="form-check-input" id="rating7" value="1">
                    <label class="form-check-label" for="rating7">Hanya tampilkan rating di atas 7</label>
                </div>

                <!-- Tombol Filter -->
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        @if($event->isEmpty())
            <p class="text-center text-muted">Tidak ada event yang cocok dengan filter ini.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered shadow-lg">
                    <thead>
                        <tr>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Jenis Event</th>
                            <th>Nama EO</th>
                            <th>Lokasi</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event as $event)
                            <tr>
                                <td>
                                    <a href="{{ route('event.detail', ['nama_event' => $event->nama_event]) }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-calendar-alt me-2"></i>{{ $event->nama_event }}
                                    </a>
                                </td>
                                <td>{{ $event->tanggal_event }}</td>
                                <td>
                                    <span class="badge 
                                        @if ($event->jenis_event === 'musik') bg-success
                                        @elseif ($event->jenis_event === 'keagamaan') bg-warning
                                        @elseif ($event->jenis_event === 'culture') bg-info
                                        @elseif ($event->jenis_event === 'pameran') bg-primary
                                        @elseif ($event->jenis_event === 'budaya') bg-secondary
                                        @else bg-dark
                                        @endif">
                                        {{ ucfirst($event->jenis_event) }}
                                    </span>
                                </td>
                                <td>{{ $event->event_organizer }}</td>
                                <td>{{ $event->lokasi_event }}</td>
                                <td>
                                    <span class="text-warning">
                                        @for ($i = 1; $i <= floor($event->rating); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($event->rating - floor($event->rating) > 0)
                                            <i class="fas fa-star-half-alt"></i>
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- Optional JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>