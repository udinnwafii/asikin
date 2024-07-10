<!-- resources/views/soft_delete.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soft Deleted Kalender Beasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Soft Deleted Kalender Beasiswa</div>

                    <div class="card-body">
                        @if ($softDeletedKalenderBeasiswa->isEmpty())
                            <p>No soft deleted Kalender Beasiswa found.</p>
                        @else
                            <table id="softDeletedTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deleted At</th>
                                        <th>Remaining Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($softDeletedKalenderBeasiswa as $index => $kalenderBeasiswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $kalenderBeasiswa->judul }}</td>
                                            <td>{{ $kalenderBeasiswa->deleted_at->format('d-m-Y H:i:s') }}</td>
                                            <td>{{ $kalenderBeasiswa->deleted_at->addDays(30)->diffForHumans(null, true) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('kalender_beasiswa.index') }}" class="btn btn-primary">Back to Kalender Beasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#softDeletedTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true
                // Add additional DataTables options here as needed
            });
        });
    </script>
</body>

</html>
