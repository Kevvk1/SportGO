<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$subject}}</title>
</head>
<body style="background-color: #d9db26; font-family: Montserrat, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #d9db26;">
    <tr>
        <td align="center" valign="top">
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 20px auto;">
                <tr>
                    <td style="padding: 20px;">
                        <div style="text-align: center;">
                            <img src="{{ asset('img/sportgo.png') }}" alt="Logo SportGO" style="width: 30%; max-width: 150px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px; text-align: center;">
                        {{-- Greeting --}}
                        @if (! empty($greeting))
                            <h1 style='text-align: center; font-size: 25px; color: black;'>{{ $greeting }}</h1>
                        @else
                            @if ($level === 'error')
                                <h1 style='color: black;'>@lang('Whoops!')</h1>
                            @else
                                <h1 style='color: black;'>@lang('Hello!')</h1>
                            @endif
                        @endif

                        {{-- Intro Lines --}}
                        @foreach ($introLines as $line)
                            <p style="color: black;">{{ $line }}</p>
                        @endforeach

                        {{-- Action Button --}}
                        @isset($actionText)
                            <?php
                                $color = $level === 'error' ? 'red' : '#d9db26';
                            ?>
                            <div style="margin-top: 20px;">
                                <a href="{{ $actionUrl }}" style="background-color: {{ $color }}; color: #000000; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">{{ $actionText }}</a>
                            </div>
                        @endisset

                        {{-- Outro Lines --}}
                        @foreach ($outroLines as $line)
                            <p style="color: black;">{{ $line }}</p>                  
                        @endforeach

                        {{-- Salutation --}}
                        @if (! empty($salutation))
                            <p style="color: black;">{{ $salutation }}, <br> {{ config('app.name') }}</p>
                        @else
                            <p style="color: black;">@lang('Regards'),<br>{{ config('app.name') }}</p>
                        @endif

                        <div style="background-color: #ffffff;">
                        {{-- Subcopy --}}
                        @isset($actionText)
                            <p style="color: #000000;">
                                @lang(
                                    "Si estás teniendo problemas para presionar el botón de \":actionText\", copia y pega el siguiente link\n".
                                    'en tu navegador:',
                                    [
                                        'actionText' => $actionText,
                                    ]
                                ) <br>
                                <a href="{{ $actionUrl }}" style="color: #d9db26; text-decoration: underline;">{{ $displayableActionUrl }}</a>
                            </p>
                        @endisset
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
