@component('mail::message')
Assalamu'alaikum Warahmatullahi Wabarakatuh,

Kepada Yth. {{$details['name']}} Peserta Webinar Jurusan Teknik Informatika

Terima kasih sudah mengikuti webinar Webinar Jurusan Teknik Informatika UIN Sunan Gunung Djati Bandung yang dilaksanakan oleh dengan tema "{{$details['title']}}" pada {{$details['pelaksanaan']}} secara Daring (Online)
Berikut kami lampirkan file Sertifikat Peserta.

Salam Hormat,
Panitia Webinar Jurusan Teknik Informatika<br>
{{ config('app.name') }}
@endcomponent
