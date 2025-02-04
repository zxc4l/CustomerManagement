<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <h1>Customer Management</h1>
    
    <!-- Button to add a new customer -->
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add New Customer</a>
    
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>UserID</th>
            <th>Email</th>
            <th>Account Type</th>
            <th>Status</th>
            <th>Login Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $customer)
            <tr>
              <td>{{ $customer->id }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->account_type }}</td>
              <td>{{ $customer->status }}</td>
              <td>{{ $customer->last_login }}</td>
              <td>
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-success btn-sm">Edit</a>
      
                <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      
      <div class="d-flex justify-content-center">
        {{ $customers->links('pagination::bootstrap-5') }}
      </div>
</div>
</body>
</html>
