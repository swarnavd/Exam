<?php
/**
 * A class to check validations.
 */
class Validation
{
  /**
   * A function to check that first name or last contains only alphabet or not.
   *
   * @param string $name
   *  Admin's registered player's name.
   *
   * @return bool
   *  Returns true if it follows the exact pattern of a full name else returns
   * false.
   */
  public function validFullName(string $name)
  {
    $nameRegex = "^[a-zA-Z]+(?: [a-zA-Z]+)$";
    if (preg_match($nameRegex, $name)) {
      return TRUE;
    }
    return FALSE;
  }
  /**
   * A function to check that password contains a special character, a upper
   * case letter and a lowercase letter and length of password should be greater
   * than 5.
   *
   * @param string $num
   *  Admin provided number of ball faced or run made by a player.
   *
   * @return bool
   *  Returns true if it follows the exact pattern of number else false.
   */
  public function validNumber($num)
  {
    $numRegex = "/[^0-9]/";
    if (preg_match($numRegex, $num)) {
      return TRUE;
    }
    return FALSE;
  }

}
