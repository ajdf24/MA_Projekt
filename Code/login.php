public function loginAction(User $loginUser){

        /** @var User $users */
        $user = $this->userRepository->findOneByUsername($loginUser->getUserName());

        $objSalt = SaltFactory::getSaltingInstance(NULL);

        //Checke Passwort und login
        if($objSalt->checkPassword($loginUser->getPassword(),
            $user->getPassword())){
            $GLOBALS['TSFE']->fe_user->checkPid = 0;
            $GLOBALS['TSFE']->fe_user->getAuthInfoArray();
            $GLOBALS['TSFE']->fe_user->fetchUserRecord($info['db_user'], $user->getUserName());

            $GLOBALS['TSFE']->fe_user->user = $GLOBALS['TSFE']->fe_user->fetchUserSession();
            $GLOBALS['TSFE']->loginUser = 1;
            $GLOBALS['TSFE']->fe_user->fetchGroupData();
            $GLOBALS['TSFE']->fe_user->start();
            $GLOBALS['TSFE']->fe_user->createUserSession($user);
            $GLOBALS['TSFE']->fe_user->loginSessionStarted = TRUE;
        }



        $linkUrl = GeneralUtility::_GP('redirect_url');
        HttpUtility::redirect($linkUrl);
}
