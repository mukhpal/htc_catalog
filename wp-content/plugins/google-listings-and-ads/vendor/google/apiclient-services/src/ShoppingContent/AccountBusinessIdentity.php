<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Automattic\WooCommerce\GoogleListingsAndAds\Vendor\Google\Service\ShoppingContent;

class AccountBusinessIdentity extends \Automattic\WooCommerce\GoogleListingsAndAds\Vendor\Google\Model
{
  /**
   * @var AccountIdentityType
   */
  public $blackOwned;
  protected $blackOwnedType = AccountIdentityType::class;
  protected $blackOwnedDataType = '';
  /**
   * @var bool
   */
  public $includeForPromotions;
  /**
   * @var AccountIdentityType
   */
  public $latinoOwned;
  protected $latinoOwnedType = AccountIdentityType::class;
  protected $latinoOwnedDataType = '';
  /**
   * @var AccountIdentityType
   */
  public $smallBusiness;
  protected $smallBusinessType = AccountIdentityType::class;
  protected $smallBusinessDataType = '';
  /**
   * @var AccountIdentityType
   */
  public $veteranOwned;
  protected $veteranOwnedType = AccountIdentityType::class;
  protected $veteranOwnedDataType = '';
  /**
   * @var AccountIdentityType
   */
  public $womenOwned;
  protected $womenOwnedType = AccountIdentityType::class;
  protected $womenOwnedDataType = '';

  /**
   * @param AccountIdentityType
   */
  public function setBlackOwned(AccountIdentityType $blackOwned)
  {
    $this->blackOwned = $blackOwned;
  }
  /**
   * @return AccountIdentityType
   */
  public function getBlackOwned()
  {
    return $this->blackOwned;
  }
  /**
   * @param bool
   */
  public function setIncludeForPromotions($includeForPromotions)
  {
    $this->includeForPromotions = $includeForPromotions;
  }
  /**
   * @return bool
   */
  public function getIncludeForPromotions()
  {
    return $this->includeForPromotions;
  }
  /**
   * @param AccountIdentityType
   */
  public function setLatinoOwned(AccountIdentityType $latinoOwned)
  {
    $this->latinoOwned = $latinoOwned;
  }
  /**
   * @return AccountIdentityType
   */
  public function getLatinoOwned()
  {
    return $this->latinoOwned;
  }
  /**
   * @param AccountIdentityType
   */
  public function setSmallBusiness(AccountIdentityType $smallBusiness)
  {
    $this->smallBusiness = $smallBusiness;
  }
  /**
   * @return AccountIdentityType
   */
  public function getSmallBusiness()
  {
    return $this->smallBusiness;
  }
  /**
   * @param AccountIdentityType
   */
  public function setVeteranOwned(AccountIdentityType $veteranOwned)
  {
    $this->veteranOwned = $veteranOwned;
  }
  /**
   * @return AccountIdentityType
   */
  public function getVeteranOwned()
  {
    return $this->veteranOwned;
  }
  /**
   * @param AccountIdentityType
   */
  public function setWomenOwned(AccountIdentityType $womenOwned)
  {
    $this->womenOwned = $womenOwned;
  }
  /**
   * @return AccountIdentityType
   */
  public function getWomenOwned()
  {
    return $this->womenOwned;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountBusinessIdentity::class, 'Google_Service_ShoppingContent_AccountBusinessIdentity');
