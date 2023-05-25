<!DOCTYPE html>
<html>
  <head>
    <title>PPID - Preview {{ $file->nama_file }}</title>
  </head>
  <body>
    <iframe src="{{ asset('storage/' . $file->path) }}" type="application/pdf" frameBorder="10" scrolling="auto" height="630px" width="100%" ></iframe>
  </body>
</html>