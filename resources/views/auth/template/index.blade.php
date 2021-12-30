
<!DOCTYPE html>
<html lang="en">

@includeIf('auth.template.header')

<body class="hold-transition login-page">
    @yield('content')
    @includeIf('auth.template.scripts')
</body>
</html>
