<?php

session_start();

if (isset($_SESSION['user'])) {
  echo json_encode(['status' => true]);
} else {
  echo json_encode(['status' => false]);
}
