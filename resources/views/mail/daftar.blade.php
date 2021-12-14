@component('mail::message')

![](data:image/png;base64,{{base64_encode(file_get_contents(public_path('storage'.str_replace('/','\\',$detail['thumbnail']))))}})
Hello {{$detail['name']}}
Nama anda telah terdaftar dalam peserta webinar {{$detail['title']}}
@component('mail::button', ['url' => $detail['url'], 'color' => 'success'])
Link Zoom
@endcomponent
Gunakan token ini untuk absensi.

<b><h3>{{$token}}</h3></b>

Panitia Webinar Jurusan Teknik Informatika<br>
{{ config('app.name') }}
@endcomponent
