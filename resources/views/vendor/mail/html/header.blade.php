<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
            <img src="{{asset('img/colepom_logo.png')}}" class="logo" alt="Colepom">
            @endif
        </a>
    </td>
</tr>