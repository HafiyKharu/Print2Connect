<!DOCTYPE html>
<html>

<head>
    <title>{{ $details['title'] }}</title>
</head>

<body>
    <x-slot name="logo">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </x-slot>
    {{-- <img src="{{ $message->embed(storage_path('app/public/logo/PRINT2CONNECT.png')) }}"> --}}
    <h1>{{ $details['title'] }}</h1>
    {{-- <p>{{ $details['body'] }}</p> --}}
    <br>

    {{-- Display print shop details (make sure $details['printshop'] is set) --}}
    @isset($details['printshop'])
        <table style="border-collapse: collapse; width: 100%;">
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Print Shop Name:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->user->name }}</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Business Registration Number:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->businessRegNo }}</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Print Shop Address:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->address }}</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Contact Number:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->contactNo }}</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Email Address:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->user->email }}</td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; padding: 5px;">Service Description:</td>
                <td style="border: none; padding: 5px;">{{ $details['printshop']->serviceDescription }}</td>
            </tr>
            @if ($details['printshop']->reason)
                <tr style="border: none;">
                    <td style="border: none; padding: 5px;">Reason:</td>
                    <td style="border: none; padding: 5px;">{{ $details['printshop']->reason }}</td>
                </tr>            
            @endif
        </table>
        <br>
    @endisset

    {{-- Include a quote or reason for approval/rejection --}}
    @isset($details['closer'])
        <p>{{ $details['closer'] }}</p>
    @endisset

</body>

</html>