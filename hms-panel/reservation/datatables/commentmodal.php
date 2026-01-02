<?php
if (isset($_GET['openCommentModal']) && $_GET['openCommentModal'] == 1) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("commentsmodal"));
            myModal.show();
        });
    </script>';
}
?>
<?php
if (isset($reservationid)) {

    $rescommentshistory = $app->selectone("SELECT count(reservationid) as reservationcomment FROM hmsrescomments WHERE reservationid='$reservationid' ");
    $rescommentshistory->reservationcomment;
}
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width: 16%;" data-bs-toggle="modal"
    data-bs-target="#commentsmodal">
    Comments
    <?php if (isset($reservationid)) {
        if ($rescommentshistory->reservationcomment == 0) { ?>
    <?php } else { ?>
    <span class="badge badge-danger"><?php echo $rescommentshistory->reservationcomment; ?></span>
    <?php }
    } ?>
</button>
<!-- Modal -->
<div class="modal fade" id="commentsmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form name="savecomment" action="executemodal.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">comments <?php echo $reservationid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ">
                        <table class="table table-striped " id="wraptable">
                            <thead>
                                <tr>
                                    <th>Comment Code</th>
                                    <th>Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rescommentshistory = $app->selectone("SELECT SUM(reservationid) as reservationcomment FROM hmsrescomments WHERE reservationid='$reservationid' ");
                                $rescommentshistory->reservationcomment;

                                if ($rescommentshistory->reservationcomment > 0) {
                                    $query = "SELECT * FROM hmsrescomments where reservationid=$reservationid ";
                                    $app = new App;
                                    $comments = $app->selectAll($query);
                                    ?>
                                <?php foreach ($comments as $comment): ?>
                                <tr>
                                    <td>
                                        <?php $query = "SELECT * FROM hmscomments where id='$comment->commentid'";
                                                $app = new App;
                                                $namecomments = $app->selectAll($query);
                                                foreach ($namecomments as $namecomment) {
                                                    echo $namecomment->comments;
                                                } ?>
                                    </td>
                                    <td style="white-space: normal;"><?php echo $comment->comments ?></td>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-guestreservationinfo2.php?commentedit=<?php echo $comment->id ?>&reservationid=<?php echo $reservationid ?>&comments=<?php echo $comment->comments ?>&openCommentModal=1&commentid=<?php echo $comment->commentid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>
                                        </a> |
                                        <a style="text-decoration:none;"
                                            href="executemodal.php?commentdelete=<?php echo $comment->id ?>&reservationid=<?php echo $reservationid ?>"
                                            class="text-danger">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;
                                } else { ?>
                                <tr>
                                    <td style="text-align:center;" colspan="4">Add Comments</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </script>
                        </table>
                    </div>
                    <hr>
                    <?php if (!isset($_GET['commentedit'])) { ?>
                    <div class="col-md-12">
                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="reservationid" value="<?php echo $reservationid; ?>">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Comment
                                    Code</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="commentid" name="commentid">
                                        <?php
                                            $query = "SELECT * FROM comments";
                                            $app = new App;
                                            $comment1s = $app->selectAll($query);
                                            ?>
                                        <?php foreach ($comment1s as $comment1): ?>
                                        <option value="<?php echo $comment1->id ?>">
                                            <?php echo $comment1->comments ?>
                                        </option>
                                        <?php endforeach;
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm"
                                    class="col-sm-3 col-form-label col-form-label-sm">Comments</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                        name="comments">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary"
                        href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                    </a>


                    <button type="submit" class="btn btn-primary" name="savecomment">Save</button>

                </div>
                <?php } else { ?>
                <?php
                    $reservationid = $_GET['reservationid'];
                    $id = $_GET['commentedit'];
                    $comments = $_GET['comments'];
                    $openCommentModal = $_GET['openCommentModal'];
                    $commentid = $_GET['commentid'];
                    ?>
                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="commentedit" value="<?php echo $id; ?>">
                            <input type="hidden" class="form-control form-control-sm" id="colFormLabelSm"
                                name="reservationid" value="<?php echo $reservationid; ?>">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Comment
                                Code</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" id="commentid" name="commentid">
                                    <?php
                                        $query = "SELECT * FROM hmscomments where id='$commentid'";
                                        $app = new App;
                                        $comment1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($comment1s as $comment1): ?>
                                    <option value="<?php echo $comment1->id ?>">
                                        <?php echo $comment1->comments ?>
                                    </option>
                                    <?php endforeach;
                                        ?>


                                    <?php
                                        $query = "SELECT * FROM hmscomments";
                                        $app = new App;
                                        $acomment1s = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($acomment1s as $acomment1): ?>
                                    <option value="<?php echo $acomment1->id ?>">
                                        <?php echo $acomment1->comments ?>
                                    </option>
                                    <?php endforeach;
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group row">
                            <label for="colFormLabelSm"
                                class="col-sm-3 col-form-label col-form-label-sm">Comments</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                    name="comments" value="<?php echo $comments ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary"
                    href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>"> Close
                </a>
                <a class="btn btn-primary"
                    href="update-guestreservationinfo2.php?reservationid=<?php echo $reservationid ?>&openCommentModal=1">
                    Add
                </a>
                <button type="submit" class="btn btn-primary" name="updatecomment">Update</button>

            </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>
<script src="removehtmlcode.js"></script>