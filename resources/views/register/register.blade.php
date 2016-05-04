<?php
/**
 * Created by PhpStorm.
 * User: Atheek
 * Date: 2/5/2016
 * Time: 8:21 AM
 */
echo "hi";
?>
@extends('home')
@section('content')
    <table>
        <table >
            <tr>
                <td>Name</td>
                <td>Email</td>

            </tr>

            <?php
            foreach($data as $row){ ?>
            <tr>
                <?php
                ?>
                <td> <?php  echo $row->id; ?> </td>
                <td> <?php  echo $row->name; ?> </td>

                <td><a href="<?php echo 'Edituser/'. $row->id; ?>">EDIT</a> </td> <?
                ?>
            </tr>
            <?php
            }
            ?>
        </table>
@stop