<div class="container">
    <h2>Create New Vendor</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vendors.store') }}" method="POST">
        @csrf

        <h4>Vendor Login Details</h4>

        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <hr>

        <h4>Shop Details</h4>
        <div>
            <label for="shop_name">Shop Name</label>
            <input type="text" name="shop_name" id="shop_name" value="{{ old('shop_name') }}" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address">{{ old('address') }}</textarea>
        </div>

        <button type="submit">Create Vendor</button>
    </form>
</div>