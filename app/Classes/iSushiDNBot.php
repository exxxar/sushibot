<?php


namespace App\Classes;


interface iSushiDNBot
{
    public function getEventsAll($page);
    public function getEventQRCode($eventId);

    public function getPaymentsAll($page);
    public function getCashBacksAll($page);

    public function getAchievements($page, $isAll = true);
    public function getAchievementsAll($page);
    public function getAchievementsMy($page);
    public function getAchievementsInfo($id);
    public function getAchievementsPrize($id);


    public function getMyFriends();
    public function getMyMoney();

    public function getPaymentMenu();
    public function getFriendsMenu();

    public function donateCharity($charityId,$value);
    public function getCharity($charityId);
    public function getCharityList($page);

    public function getRefLink();

    public function getFAQMenu();
    public function getFAQSimpleMenu();
    public function getFAQBottomMenu();

    public function getMainMenu();

    public function getPromotionsMenu();
    public function getFriends($page);
    public function getStatisticMenu();
    public function getAchievementsMenu();
    public function getPromouterMenu();

    public function getLotteryMenu();
    public function getLotteryGiftCompanies($giftType);
    public function payForLottery($giftType,$companyId);

    public function getLatestCashBack();

    public function doPromotionEditData();

    public function getPromotionsByCategory($page);
    public function getPromotionsByCompany($page);

    public function getPromotionsByInstagram($page);

    public function getCategoryById($id,$page);
    public function getCompanyById($id,$page);

    public function getArticlesByPartId($partId);

    public function getActivityInformation();
    public function getCashBackByCompanies();

    public function getLotterySlot($slotId,$codeId);

    public function getFallback();

    public function uploadImages($images);

    public function receivesLocations($location);

    public function getGeoQuestList($page);
    public function getGeoPositionsList($questId);
    public function getGeoQuestCompletion($questId);
    public function getGeoPositionInfo($positionId);

}
