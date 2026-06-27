<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>

.pagination svg{
   width: 16px !important;
   height: 16px !important;
   vertical-align: middle;
}

.pagination .pagination link {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    font-size: 14px;
}
svg{
    max-width: 16px;
    max-height: 16px;
}

</style>
<body class="container mt-5">

    <h2 class="mb-4">🎓 Student Information System</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search Form --}}
    <form action="{{ route('students.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search by name or course..."
                   value="{{ $search }}">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                Search
            </button>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                Clear
            </a>
        </div>
    </form>

    {{-- Add Student --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Add Student</strong>
        </div>

        <div class="card-body">

            <form action="{{ route('students.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Student Name"
                               required>
                    </div>

                    <div class="col-md-3 mb-2">
                        <input type="text"
                               name="course"
                               class="form-control"
                               placeholder="Course"
                               required>
                    </div>

                    <div class="col-md-2 mb-2">
                        <input type="number"
                               name="year_level"
                               class="form-control"
                               placeholder="Year"
                               required>
                    </div>

                    <div class="col-md-3 mb-2">
                        <button class="btn btn-success w-100">
                            Add Record
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- Student Table --}}
    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th width="170">Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($students as $student)

            <tr>

                <td>{{ $student->id }}</td>

                <td>{{ $student->name }}</td>

                <td>{{ $student->course }}</td>

                <td>{{ $student->year_level }}</td>

                <td>

                    <a href="{{ route('students.edit',$student->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('students.destroy',$student->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this student?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">
                    No student records found.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="pagination-container mt-4">
        {{ $students->links() }}
    </div>

</div>

</body>
</html>