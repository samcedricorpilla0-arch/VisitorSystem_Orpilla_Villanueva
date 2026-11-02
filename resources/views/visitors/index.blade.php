
<!DOCTYPE html>
<html>
<head>
    <title>Visitor Management</title>
</head>
<body>
    <h1>Visitors</h1>

    <a href="{{ route('visitors.create') }}">Add New Visitor</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->id }}</td>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->address }}</td>
                    <td>{{ $visitor->position }}</td>
                    <td>
                        <a href="{{ route('visitors.show', $visitor->id) }}">View</a>

                        <a href="{{ route('visitors.edit', $visitor->id) }}">Edit</a>

                        <form action="{{ route('visitors.destroy', $visitor->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this visitor?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No visitors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
