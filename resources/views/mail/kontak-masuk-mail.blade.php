@component('mail::message')
# Pesan Baru dari Website

**Subject:** {{ $data['subject'] }}

**Nama:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Pesan:**
{{ $data['message'] }}

@component('mail::subcopy')
Form kontak dari website Tasty Food.
@endcomponent
@endcomponent