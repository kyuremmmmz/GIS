@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'University of Perpetual Help System Dalta - Molino Campus')
<img src="" class="logo" alt="University of Perpetual Help System Dalta - Molino Campus Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
