<?php
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Exams Results</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <center>
                            <h1>Old Exams Results</h1>
                        </center>
                        <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from exam_results order by id desc");
                        $count=mysqli_num_rows($res);

                        if($count==0)
                        {
                            ?>
                            <center>
                                <h1>No Results Found</h1>
                            </center>
                            <?php
                        }
                        else{
                            echo "<table class='table table-bordered'>";
                            echo "<tr style='background-color: cornflowerblue; color: black'>";
                            echo "<th>"; echo "Username"; echo "</th>";
                            echo "<th>"; echo "exam type"; echo "</th>";
                            echo "<th>"; echo "total question"; echo "</th>";
                            echo "<th>"; echo "correct answer"; echo "</th>";
                            echo "<th>"; echo "wrong answer"; echo "</th>";
                            echo "<th>"; echo "exam time"; echo "</th>";
                            echo "</tr>";
                            while($row=mysqli_fetch_array($res))
                            {
                                echo "<tr>";
                                echo "<td>"; echo $row["Username"]; echo "</td>";
                                echo "<td>"; echo $row["exam_type"]; echo "</td>";
                                echo "<td>"; echo $row["total_question"]; echo "</td>";
                                echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                                echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                                echo "<td>"; echo $row["exam_time"]; echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }
                        ?>


                    </div>
                </div>

            </div>
            <!--/.col-->
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php
include "footer.php";
?>

