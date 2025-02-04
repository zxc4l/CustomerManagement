<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form action="{{ route('customers.update', $customer) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <h3>Update Customer Information</h3>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            class="form-control" 
            value="{{ $customer->email }}" 
            required 
            placeholder="Enter customer's email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            class="form-control" 
            placeholder="Enter new password (if changing)">
    </div>

    <div class="mb-3">
        <label for="account_type" class="form-label">Account Type:</label>
        <select name="account_type" id="account_type" class="form-select">
            <option value="basic" {{ $customer->account_type === 'basic' ? 'selected' : '' }}>Basic</option>
            <option value="premium" {{ $customer->account_type === 'premium' ? 'selected' : '' }}>Premium</option>
            <option value="enterprise" {{ $customer->account_type === 'enterprise' ? 'selected' : '' }}>Enterprise</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select name="status" id="status" class="form-select">
            <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $customer->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="banned" {{ $customer->status === 'banned' ? 'selected' : '' }}>Banned</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Customer</button>
    <!-- Back Button -->
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
</form>
