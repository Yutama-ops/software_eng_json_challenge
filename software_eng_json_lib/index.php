<?php
include('getdata.php');
include('header.php');

if(count($obj) > 0){
    
    // for($x = $offset; $x <= $no_of_records_per_page; $x++){     
        for($i = $offset; $i<=$offset+10;$i++){  
        // foreach($obj as $row){
            
            $output .= '
                    <tr>
                        <td><a href="search.php?search_by=type&name='.$obj[$i]['type'].'">'.$obj[$i]['type'].'</a></td>
                        <td><a href="search.php?search_by=title&name='.$obj[$i]['title'].'">'.$obj[$i]['title'].'</a></td>
                        <td><a href="search.php?search_by=author&name='.$obj[$i]['author'].'">'.$obj[$i]['author'].'</a></td>
                        <td>'.$obj[$i]['Subjects'].'</td>
                    </tr>
                    ';
                    
    }
    
} else {
    $output .='<tr> <td colspan="3" align="center">'.$obj.'Not Found</td></tr>';
}
?>
<body>
    <div class="container" style="margin-top: 30px;">
        <h3 align="center" style="margin-bottom: 20px;">To Do List</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $output;?>
            </tbody>
        </table>
        <!-- shopping cart form -->
        <form method="GET" id="api_form" action="search.php">
            <div class="form-group">
                <input list="browsers" type="text" name="search_by" class="form-control" id="search_by" placeholder="search by"></input>
                <datalist id="browsers">
                <option value="type">
                <option value="title">
                <option value="author">
                <option value="subject">
                </datalist>
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" id="name"></input>
            </div>
           
            <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Add"></input>  
        </form>
        <form method="POST" id="api_form_shopchart">
        
        <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
        </form>
            
        
        </form>
        
</body>
</html>