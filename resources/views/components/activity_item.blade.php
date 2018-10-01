<tr>
    <td class="text-center td-icon"><i class="fa fa-file text-primary">&nbsp;</i> </td>
    <td class="txt-oflo text-capitalize {{$type == 'credit'? 'text-success': 'text-danger'}}">{{$type}}</td>
    <td>{{$date}}</td>
    <td class="txt-oflo">${{$amount}}</td>
    <td class="text-capitalize">{{$description}}</td>
</tr>