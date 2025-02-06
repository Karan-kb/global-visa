<p>
    Dear Admin, <br>
    New message from contact page in your website. <br>
    <strong style="text-decoration:underline;">Message Details:</strong>
</p>
<p> <strong>Name : </strong> {{$contact['name']}}</p>
<p> <strong>Email : </strong> {{$contact['email']}}</p>
<p> <strong>Destination : </strong> {{$contact['email']}}</p>
@if($contact['phone'])
<p> <strong>Phone : </strong> {{$contact['phone']}}</p>
@endif
<p> <strong>Query : </strong> <br> {{$contact['message']}}</p>
<p>
Regards, <br>
{{ App\Helpers\Helper::getInfoValue('name') }}
</p>