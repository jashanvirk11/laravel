<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
        <td bgcolor="black" align="center" style="padding: 0px 5px 0px 5px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="" align="center" valign="top" style="padding: 20px 20px 30px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 48px; font-weight: 400; margin: 2;"></h1> <img src="{{asset('uploads/logo/logo.png')}}" width="100%" height="100%" style="display: block; border: 0px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>

@component('mail::message')
# {{ $user['title'] }}
# {{ $user['name'] }}
# {{ $user['email'] }}
# {{ $user['message'] }}

The body of your message.

<!--@component('mail::button', ['url' => $user['url']])-->
<!--@endcomponent-->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
</table>