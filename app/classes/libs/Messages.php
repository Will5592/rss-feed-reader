<?php
class Messages
{
    public function showMessage()
    {
        if (isset($_SESSION['message'])) {

            $msg = $_SESSION['message'];

            switch ($msg) {
                case 'added':
                    echo '<div class="bg-success text-white text-center p-3 mt-0 mb-3 ">URL was added.</div>';
                    break;
                case 'deleted':
                    echo '<div class="bg-danger text-white text-center p-3 mt-0 mb-3 ">Entry was deleted</div>';
                    break;
                case 'updated':
                    echo '<div class="bg-info text-white text-center p-3 mt-0 mb-3 ">Entry was updated.</div>';
                    break;
            }

            unset($_SESSION['message']);
        }
    }
}
