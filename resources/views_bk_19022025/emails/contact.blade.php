<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Homes | Contact Request</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    </style>
</head>

<body style="font-family: 'Roboto', Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; margin: 0; padding: 0;">
    <div style="width: 100%; max-width: 700px; margin: 20px auto; background: linear-gradient(135deg, #ffffff, #f0f0f0); border-radius: 15px; overflow: hidden; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
        <div style="color: #ffffff; padding: 10px 20px; text-align: center; border-bottom: 1px solid #13a08f;">
            <img src="{{ asset('assets/img/logo.png') }}" alt="EL Real Estate Logo" style="max-width: 240px;">
        </div>
        <div style="padding: 25px; background-color: #ffffff;">
            <p>Dear <strong>Admin</strong>,</p>
            <p>A client has expressed interest in the following properties. Please review the details below and respond with the required information.</p>

            <h4 style="color: #1F4B43; margin-top: 20px; margin-bottom: 5px; font-size: 18px;">Properties</h4>
            <table style="width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 14px;">
                <thead>
                    <tr>
                        <th style="background-color: #13a08f; color: #ffffff; font-size: 12px; text-transform: uppercase; border: 1px solid #ddd; padding: 8px 6px; text-align: left;">Property Code</th>
                        <th style="background-color: #13a08f; color: #ffffff; font-size: 12px; text-transform: uppercase; border: 1px solid #ddd; padding: 8px 6px; text-align: left;">Title</th>
                        <th style="background-color: #13a08f; color: #ffffff; font-size: 12px; text-transform: uppercase; border: 1px solid #ddd; padding: 8px 6px; text-align: left;">Neighborhood</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                    <tr style="border: 1px solid #ddd; padding: 8px 6px; text-align: left;">
                        <td style="border: 1px solid #ddd; padding: 8px 6px;">{{$property->code}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px 6px;"><a href="{{url('admin/property-listings/details/' . $property->id )}}" target="_blank" style="color: #1F4B43; font-weight: bold; text-decoration: none; transition: color 0.3s;">{{$property->title}}</a></td>
                        <td style="border: 1px solid #ddd; padding: 8px 6px;">{{$property->neighborhood->title}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 style="color: #1F4B43; margin-top: 20px; margin-bottom: 5px; font-size: 18px;">Client Details</h4>
            <div style="background-color: #f4f4f4; padding: 15px; border-radius: 8px; border: 1px solid #ddd; margin-top: 10px;">
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Email:</strong> <a href="mailto:{{$data['email']}}" target="_blank" style="color: #1F4B43; text-decoration: none;">{{$data['email']}}</a></p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Phone:</strong> <a href="tel:{{$data['phone']}}" target="_blank" style="color: #1F4B43; text-decoration: none;">{{$data['phone']}}</a></p>
            </div>

            <h4 style="color: #1F4B43; margin-top: 20px; margin-bottom: 5px; font-size: 18px;">Message</h4>
            <p style="margin: 15px 0; font-size: 15px; color: #555;">{{$data['message']}}</p>

            <p style="margin: 15px 0; font-size: 15px; color: #555;"><strong>Best Regards,</strong><br>{{$data['name']}}</p>
        </div>
        <div style="text-align: center; font-size: 12px; color: #666; padding: 15px 20px; background: #f4f4f4; border-top: 1px solid #ddd;">
            <p style="margin: 0;">&copy; 2025 EL Real Estate. All rights reserved.</p>
        </div>
    </div>
</body>

</html>