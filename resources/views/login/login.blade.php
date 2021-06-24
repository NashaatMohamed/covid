<form method="post" action="{{route('login_check')}}">
    @csrf
    <div class="form-group">
        <label for="username">username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username">
        @error('username')<span class="text-danger"></span>@enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
        @error('password')<span class="text-danger"></span>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
