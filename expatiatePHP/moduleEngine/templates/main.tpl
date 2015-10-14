<{ include "header.tpl" }>
<table border="1" align="center" width="90%" cellpadding="3" cellspacing="0">
       <caption><h1> <{ $tableName }> <h1></caption>
       <tr bgcolor="#cccccc">
           <th>编号</th><th>姓名</th><th>性别</th><th>年龄</th><th>电子邮件</th>
       </tr>
       
       <{ loop $users $users }>
       <tr>
           <{ loop $users $colKey => $colValue }>
                <{ if $colKey == "sex" }>
                    <{ if $colValue == "m" }>
                            <td bgColor="red"> <{ $colValue }> </td>
                    
                    <{ elseif $colValue == "f" }>
                            <td bgColor="green"> <{ $colValue }> </td>
                    
                    <{ else }>
                            <td bgColor="blue"> 未知 </td>
                    <{ /if }>
                <{ else}>
                    <td> <{ $colValue }> </td>
                <{ /if }> 
           <{ /loop }>
       </tr>
       <{ /loop }>
</table>
<center>共查找到<b> <{ $rowNum }> </b>条记录</center>
<{ include 'footer.tpl' }>