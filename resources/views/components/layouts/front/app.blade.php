<!DOCTYPE html>
<html lang="en">
@include('components.layouts.front.head')
<body>
@include('components.layouts.front.header')
{{$slot}}
@include('components.layouts.front.footer')
</body>
</html>
