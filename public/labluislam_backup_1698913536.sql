

CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_no` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `initial_balance` double DEFAULT NULL,
  `total_balance` double NOT NULL,
  `note` text DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO accounts VALUES("1","11111","Sales Account","1000","1000","this is first account","0","0","2018-12-18 20:58:02","2022-07-16 13:53:55");
INSERT INTO accounts VALUES("3","21211","Sa","0","0","","0","0","2018-12-18 20:58:56","2022-07-16 13:54:06");
INSERT INTO accounts VALUES("5","67665677","Ventas","1000","1000","","1","1","2022-07-16 13:53:28","2022-07-16 13:53:44");
INSERT INTO accounts VALUES("6","76344547","Compras","1000","1000","","","1","2022-07-16 13:54:36","2022-07-16 13:54:36");
INSERT INTO accounts VALUES("7","696577665","Gastos","1000","1000","","","1","2022-07-16 13:54:55","2022-07-16 13:54:55");



CREATE TABLE `adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `total_qty` double NOT NULL,
  `item` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO adjustments VALUES("1","adr-20220731-101908","1","","1","1","","2022-07-31 21:19:08","2022-07-31 21:19:08");



CREATE TABLE `attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkin` varchar(191) NOT NULL,
  `checkout` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `billers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) NOT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO billers VALUES("1","Bùi Đức Toàn","","AnToanHome","Toàn","hero70411@gmail.com","0904422959","58 Tố Hữu","Quận Nam Từ Liêm","Hà Nội","12015","Vietnam","1","2022-07-31 18:39:20","2022-07-31 18:39:20");



CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO brands VALUES("1","Apple","20220731114103.jpg","1","2022-07-31 18:14:43","2022-07-31 22:41:03");
INSERT INTO brands VALUES("2","Samsung","","1","2023-09-03 15:17:26","2023-09-03 15:17:26");



CREATE TABLE `cash_registers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cash_in_hand` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO cash_registers VALUES("1","10000","1","1","0","2023-08-20 02:00:35","2023-08-20 02:05:42");
INSERT INTO cash_registers VALUES("2","100","1","1","1","2023-08-20 02:06:02","2023-08-20 02:06:02");



CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES("1","Mobile","20220731114240.jpg","","1","2022-07-31 18:15:28","2022-07-31 22:42:40");
INSERT INTO categories VALUES("2","Charger","20231001114222.jpg","","1","2023-10-01 23:42:22","2023-10-01 23:42:22");



CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `minimum_amount` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `exchange_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO currencies VALUES("1","US Dollar","USD","1","2020-11-01 18:22:58","2020-11-01 18:34:55");
INSERT INTO currencies VALUES("3","Euro","Euro","0.85","2022-07-16 13:12:27","2022-07-31 15:18:25");



CREATE TABLE `customer_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `percentage` varchar(191) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customer_groups VALUES("1","Vip","-10","1","2022-07-31 18:16:54","2022-07-31 18:41:05");



CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) NOT NULL,
  `tax_no` varchar(191) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `points` double DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `expense` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customers VALUES("1","1","","Bùi Đức Toàn","AnToanHome","hero70411@gmail.com","0904422959","","58 Tố Hữu","Quận Nam Từ Liêm","Hà Nội","12015","Vietnam","25","","","1","2022-07-31 18:17:35","2022-07-31 21:34:32");
INSERT INTO customers VALUES("2","1","38","ttt","jkjkjk","userr@gmail.com","01444444","1454524254","jklkj","dfgfd","dfgdf","415245","dfgdf","","","","1","2023-10-24 05:53:23","2023-10-24 05:53:23");



CREATE TABLE `deliveries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `delivered_by` varchar(191) DEFAULT NULL,
  `recieved_by` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO deliveries VALUES("1","dr-20220731-115653","1","1","58 Tố Hữu Quận Nam Từ Liêm Vietnam","","","","","3","2022-07-31 22:57:00","2022-07-31 22:57:00");



CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `deposits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `discount_plan_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `discount_plan_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO discount_plan_customers VALUES("1","1","1","2022-07-31 22:08:54","2022-07-31 22:08:54");



CREATE TABLE `discount_plan_discounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `discount_id` int(11) NOT NULL,
  `discount_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO discount_plan_discounts VALUES("1","1","1","2022-07-31 22:11:21","2022-07-31 22:11:21");



CREATE TABLE `discount_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO discount_plans VALUES("1","FlashSale","1","2022-07-31 22:08:54","2022-07-31 22:08:54");



CREATE TABLE `discounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `applicable_for` varchar(191) NOT NULL,
  `product_list` longtext DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `type` varchar(191) NOT NULL,
  `value` double NOT NULL,
  `minimum_qty` double NOT NULL,
  `maximum_qty` double NOT NULL,
  `days` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO discounts VALUES("1","FlashSale1","All","","2022-08-01","2022-08-03","percentage","1","1","10","Mon,Tue,Wed,Thu,Fri,Sat,Sun","1","2022-07-31 22:11:21","2022-07-31 22:11:21");



CREATE TABLE `dso_alerts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_info` longtext NOT NULL,
  `number_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `expense_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expense_categories VALUES("1","23020428","Lắp đặt","1","2022-07-31 18:50:34","2022-07-31 18:50:34");



CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expenses VALUES("1","er-20220731-075050","1","1","5","1","","100","","2022-07-31 18:50:50","2022-07-31 18:50:50");
INSERT INTO expenses VALUES("2","er-20230831-052618","1","1","5","1","2","100","","2023-08-31 00:00:00","2023-08-31 17:26:18");



CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `general_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_title` varchar(191) NOT NULL,
  `site_logo` varchar(191) DEFAULT NULL,
  `is_rtl` tinyint(1) DEFAULT NULL,
  `currency` varchar(191) NOT NULL,
  `staff_access` varchar(191) NOT NULL,
  `date_format` varchar(191) NOT NULL,
  `developed_by` varchar(191) DEFAULT NULL,
  `invoice_format` varchar(191) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `theme` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_position` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO general_settings VALUES("1","FIX4YOU CELLULAR","20230824032408.jpg","0","1","own","d-m-Y","FIX4YOU","standard","1","default.css","2018-07-07 00:13:11","2023-10-22 05:22:36","prefix");



CREATE TABLE `gift_card_recharges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gift_card_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `gift_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_no` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `expense` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO gift_cards VALUES("1","0721283464761931","1000","0","1","","2022-09-10","1","1","2022-07-31 22:45:13","2022-07-31 22:45:13");



CREATE TABLE `holidays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `note` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `hrm_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `checkin` varchar(191) NOT NULL,
  `checkout` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO hrm_settings VALUES("1","9:00am","6:00pm","2019-01-02 20:20:08","2022-07-16 13:13:14");



CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO languages VALUES("1","en","2018-07-08 16:59:17","2019-12-25 11:34:20");



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("1","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("2","2014_10_12_100000_create_password_resets_table","1");
INSERT INTO migrations VALUES("3","2018_02_17_060412_create_categories_table","1");
INSERT INTO migrations VALUES("4","2018_02_20_035727_create_brands_table","1");
INSERT INTO migrations VALUES("5","2018_02_25_100635_create_suppliers_table","1");
INSERT INTO migrations VALUES("6","2018_02_27_101619_create_warehouse_table","1");
INSERT INTO migrations VALUES("7","2018_03_03_040448_create_units_table","1");
INSERT INTO migrations VALUES("8","2018_03_04_041317_create_taxes_table","1");
INSERT INTO migrations VALUES("9","2018_03_10_061915_create_customer_groups_table","1");
INSERT INTO migrations VALUES("10","2018_03_10_090534_create_customers_table","1");
INSERT INTO migrations VALUES("11","2018_03_11_095547_create_billers_table","1");
INSERT INTO migrations VALUES("12","2018_04_05_054401_create_products_table","1");
INSERT INTO migrations VALUES("13","2018_04_06_133606_create_purchases_table","1");
INSERT INTO migrations VALUES("14","2018_04_06_154600_create_product_purchases_table","1");
INSERT INTO migrations VALUES("15","2018_04_06_154915_create_product_warhouse_table","1");
INSERT INTO migrations VALUES("16","2018_04_10_085927_create_sales_table","1");
INSERT INTO migrations VALUES("17","2018_04_10_090133_create_product_sales_table","1");
INSERT INTO migrations VALUES("18","2018_04_10_090254_create_payments_table","1");
INSERT INTO migrations VALUES("19","2018_04_10_090341_create_payment_with_cheque_table","1");
INSERT INTO migrations VALUES("20","2018_04_10_090509_create_payment_with_credit_card_table","1");
INSERT INTO migrations VALUES("21","2018_04_13_121436_create_quotation_table","1");
INSERT INTO migrations VALUES("22","2018_04_13_122324_create_product_quotation_table","1");
INSERT INTO migrations VALUES("23","2018_04_14_121802_create_transfers_table","1");
INSERT INTO migrations VALUES("24","2018_04_14_121913_create_product_transfer_table","1");
INSERT INTO migrations VALUES("25","2018_05_13_082847_add_payment_id_and_change_sale_id_to_payments_table","2");
INSERT INTO migrations VALUES("26","2018_05_13_090906_change_customer_id_to_payment_with_credit_card_table","3");
INSERT INTO migrations VALUES("27","2018_05_20_054532_create_adjustments_table","4");
INSERT INTO migrations VALUES("28","2018_05_20_054859_create_product_adjustments_table","4");
INSERT INTO migrations VALUES("29","2018_05_21_163419_create_returns_table","5");
INSERT INTO migrations VALUES("30","2018_05_21_163443_create_product_returns_table","5");
INSERT INTO migrations VALUES("31","2018_06_02_050905_create_roles_table","6");
INSERT INTO migrations VALUES("32","2018_06_02_073430_add_columns_to_users_table","7");
INSERT INTO migrations VALUES("33","2018_06_03_053738_create_permission_tables","8");
INSERT INTO migrations VALUES("36","2018_06_21_063736_create_pos_setting_table","9");
INSERT INTO migrations VALUES("37","2018_06_21_094155_add_user_id_to_sales_table","10");
INSERT INTO migrations VALUES("38","2018_06_21_101529_add_user_id_to_purchases_table","11");
INSERT INTO migrations VALUES("39","2018_06_21_103512_add_user_id_to_transfers_table","12");
INSERT INTO migrations VALUES("40","2018_06_23_061058_add_user_id_to_quotations_table","13");
INSERT INTO migrations VALUES("41","2018_06_23_082427_add_is_deleted_to_users_table","14");
INSERT INTO migrations VALUES("42","2018_06_25_043308_change_email_to_users_table","15");
INSERT INTO migrations VALUES("43","2018_07_06_115449_create_general_settings_table","16");
INSERT INTO migrations VALUES("44","2018_07_08_043944_create_languages_table","17");
INSERT INTO migrations VALUES("45","2018_07_11_102144_add_user_id_to_returns_table","18");
INSERT INTO migrations VALUES("46","2018_07_11_102334_add_user_id_to_payments_table","18");
INSERT INTO migrations VALUES("47","2018_07_22_130541_add_digital_to_products_table","19");
INSERT INTO migrations VALUES("49","2018_07_24_154250_create_deliveries_table","20");
INSERT INTO migrations VALUES("50","2018_08_16_053336_create_expense_categories_table","21");
INSERT INTO migrations VALUES("51","2018_08_17_115415_create_expenses_table","22");
INSERT INTO migrations VALUES("55","2018_08_18_050418_create_gift_cards_table","23");
INSERT INTO migrations VALUES("56","2018_08_19_063119_create_payment_with_gift_card_table","24");
INSERT INTO migrations VALUES("57","2018_08_25_042333_create_gift_card_recharges_table","25");
INSERT INTO migrations VALUES("58","2018_08_25_101354_add_deposit_expense_to_customers_table","26");
INSERT INTO migrations VALUES("59","2018_08_26_043801_create_deposits_table","27");
INSERT INTO migrations VALUES("60","2018_09_02_044042_add_keybord_active_to_pos_setting_table","28");
INSERT INTO migrations VALUES("61","2018_09_09_092713_create_payment_with_paypal_table","29");
INSERT INTO migrations VALUES("62","2018_09_10_051254_add_currency_to_general_settings_table","30");
INSERT INTO migrations VALUES("63","2018_10_22_084118_add_biller_and_store_id_to_users_table","31");
INSERT INTO migrations VALUES("65","2018_10_26_034927_create_coupons_table","32");
INSERT INTO migrations VALUES("66","2018_10_27_090857_add_coupon_to_sales_table","33");
INSERT INTO migrations VALUES("67","2018_11_07_070155_add_currency_position_to_general_settings_table","34");
INSERT INTO migrations VALUES("68","2018_11_19_094650_add_combo_to_products_table","35");
INSERT INTO migrations VALUES("69","2018_12_09_043712_create_accounts_table","36");
INSERT INTO migrations VALUES("70","2018_12_17_112253_add_is_default_to_accounts_table","37");
INSERT INTO migrations VALUES("71","2018_12_19_103941_add_account_id_to_payments_table","38");
INSERT INTO migrations VALUES("72","2018_12_20_065900_add_account_id_to_expenses_table","39");
INSERT INTO migrations VALUES("73","2018_12_20_082753_add_account_id_to_returns_table","40");
INSERT INTO migrations VALUES("74","2018_12_26_064330_create_return_purchases_table","41");
INSERT INTO migrations VALUES("75","2018_12_26_144210_create_purchase_product_return_table","42");
INSERT INTO migrations VALUES("76","2018_12_26_144708_create_purchase_product_return_table","43");
INSERT INTO migrations VALUES("77","2018_12_27_110018_create_departments_table","44");
INSERT INTO migrations VALUES("78","2018_12_30_054844_create_employees_table","45");
INSERT INTO migrations VALUES("79","2018_12_31_125210_create_payrolls_table","46");
INSERT INTO migrations VALUES("80","2018_12_31_150446_add_department_id_to_employees_table","47");
INSERT INTO migrations VALUES("81","2019_01_01_062708_add_user_id_to_expenses_table","48");
INSERT INTO migrations VALUES("82","2019_01_02_075644_create_hrm_settings_table","49");
INSERT INTO migrations VALUES("83","2019_01_02_090334_create_attendances_table","50");
INSERT INTO migrations VALUES("84","2019_01_27_160956_add_three_columns_to_general_settings_table","51");
INSERT INTO migrations VALUES("85","2019_02_15_183303_create_stock_counts_table","52");
INSERT INTO migrations VALUES("86","2019_02_17_101604_add_is_adjusted_to_stock_counts_table","53");
INSERT INTO migrations VALUES("87","2019_04_13_101707_add_tax_no_to_customers_table","54");
INSERT INTO migrations VALUES("89","2019_10_14_111455_create_holidays_table","55");
INSERT INTO migrations VALUES("90","2019_11_13_145619_add_is_variant_to_products_table","56");
INSERT INTO migrations VALUES("91","2019_11_13_150206_create_product_variants_table","57");
INSERT INTO migrations VALUES("92","2019_11_13_153828_create_variants_table","57");
INSERT INTO migrations VALUES("93","2019_11_25_134041_add_qty_to_product_variants_table","58");
INSERT INTO migrations VALUES("94","2019_11_25_134922_add_variant_id_to_product_purchases_table","58");
INSERT INTO migrations VALUES("95","2019_11_25_145341_add_variant_id_to_product_warehouse_table","58");
INSERT INTO migrations VALUES("96","2019_11_29_182201_add_variant_id_to_product_sales_table","59");
INSERT INTO migrations VALUES("97","2019_12_04_121311_add_variant_id_to_product_quotation_table","60");
INSERT INTO migrations VALUES("98","2019_12_05_123802_add_variant_id_to_product_transfer_table","61");
INSERT INTO migrations VALUES("100","2019_12_08_114954_add_variant_id_to_product_returns_table","62");
INSERT INTO migrations VALUES("101","2019_12_08_203146_add_variant_id_to_purchase_product_return_table","63");
INSERT INTO migrations VALUES("102","2020_02_28_103340_create_money_transfers_table","64");
INSERT INTO migrations VALUES("103","2020_07_01_193151_add_image_to_categories_table","65");
INSERT INTO migrations VALUES("105","2020_09_26_130426_add_user_id_to_deliveries_table","66");
INSERT INTO migrations VALUES("107","2020_10_11_125457_create_cash_registers_table","67");
INSERT INTO migrations VALUES("108","2020_10_13_155019_add_cash_register_id_to_sales_table","68");
INSERT INTO migrations VALUES("109","2020_10_13_172624_add_cash_register_id_to_returns_table","69");
INSERT INTO migrations VALUES("110","2020_10_17_212338_add_cash_register_id_to_payments_table","70");
INSERT INTO migrations VALUES("111","2020_10_18_124200_add_cash_register_id_to_expenses_table","71");
INSERT INTO migrations VALUES("112","2020_10_21_121632_add_developed_by_to_general_settings_table","72");
INSERT INTO migrations VALUES("113","2019_08_19_000000_create_failed_jobs_table","73");
INSERT INTO migrations VALUES("114","2020_10_30_135557_create_notifications_table","73");
INSERT INTO migrations VALUES("115","2020_11_01_044954_create_currencies_table","74");
INSERT INTO migrations VALUES("116","2020_11_01_140736_add_price_to_product_warehouse_table","75");
INSERT INTO migrations VALUES("117","2020_11_02_050633_add_is_diff_price_to_products_table","76");
INSERT INTO migrations VALUES("118","2020_11_09_055222_add_user_id_to_customers_table","77");
INSERT INTO migrations VALUES("119","2020_11_17_054806_add_invoice_format_to_general_settings_table","78");
INSERT INTO migrations VALUES("120","2021_02_10_074859_add_variant_id_to_product_adjustments_table","79");
INSERT INTO migrations VALUES("121","2021_03_07_093606_create_product_batches_table","80");
INSERT INTO migrations VALUES("122","2021_03_07_093759_add_product_batch_id_to_product_warehouse_table","80");
INSERT INTO migrations VALUES("123","2021_03_07_093900_add_product_batch_id_to_product_purchases_table","80");
INSERT INTO migrations VALUES("124","2021_03_11_132603_add_product_batch_id_to_product_sales_table","81");
INSERT INTO migrations VALUES("127","2021_03_25_125421_add_is_batch_to_products_table","82");
INSERT INTO migrations VALUES("128","2021_05_19_120127_add_product_batch_id_to_product_returns_table","82");
INSERT INTO migrations VALUES("130","2021_05_22_105611_add_product_batch_id_to_purchase_product_return_table","83");
INSERT INTO migrations VALUES("131","2021_05_23_124848_add_product_batch_id_to_product_transfer_table","84");
INSERT INTO migrations VALUES("132","2021_05_26_153106_add_product_batch_id_to_product_quotation_table","85");
INSERT INTO migrations VALUES("133","2021_06_08_213007_create_reward_point_settings_table","86");
INSERT INTO migrations VALUES("134","2021_06_16_104155_add_points_to_customers_table","87");
INSERT INTO migrations VALUES("135","2021_06_17_101057_add_used_points_to_payments_table","88");
INSERT INTO migrations VALUES("136","2021_07_06_132716_add_variant_list_to_products_table","89");
INSERT INTO migrations VALUES("137","2021_09_27_161141_add_is_imei_to_products_table","90");
INSERT INTO migrations VALUES("138","2021_09_28_170052_add_imei_number_to_product_warehouse_table","91");
INSERT INTO migrations VALUES("139","2021_09_28_170126_add_imei_number_to_product_purchases_table","91");
INSERT INTO migrations VALUES("140","2021_10_03_170652_add_imei_number_to_product_sales_table","92");
INSERT INTO migrations VALUES("141","2021_10_10_145214_add_imei_number_to_product_returns_table","93");
INSERT INTO migrations VALUES("142","2021_10_11_104504_add_imei_number_to_product_transfer_table","94");
INSERT INTO migrations VALUES("143","2021_10_12_160107_add_imei_number_to_purchase_product_return_table","95");
INSERT INTO migrations VALUES("144","2021_10_12_205146_add_is_rtl_to_general_settings_table","96");
INSERT INTO migrations VALUES("145","2021_10_23_142451_add_is_approve_to_payments_table","97");
INSERT INTO migrations VALUES("146","2022_01_13_191242_create_discount_plans_table","97");
INSERT INTO migrations VALUES("147","2022_01_14_174318_create_discount_plan_customers_table","97");
INSERT INTO migrations VALUES("148","2022_01_14_202439_create_discounts_table","98");
INSERT INTO migrations VALUES("149","2022_01_16_153506_create_discount_plan_discounts_table","98");
INSERT INTO migrations VALUES("150","2022_02_05_174210_add_order_discount_type_and_value_to_sales_table","99");
INSERT INTO migrations VALUES("154","2022_05_26_195506_add_daily_sale_objective_to_products_table","100");
INSERT INTO migrations VALUES("155","2022_05_28_104209_create_dso_alerts_table","101");
INSERT INTO migrations VALUES("156","2022_06_01_112100_add_is_embeded_to_products_table","102");
INSERT INTO migrations VALUES("157","2023_08_26_021353_add_is_serialization_to_products","103");
INSERT INTO migrations VALUES("159","2023_08_26_023843_create_serials_table","104");
INSERT INTO migrations VALUES("163","2019_05_03_000001_create_customer_columns","105");
INSERT INTO migrations VALUES("164","2019_05_03_000002_create_subscriptions_table","105");
INSERT INTO migrations VALUES("165","2019_05_03_000003_create_subscription_items_table","105");
INSERT INTO migrations VALUES("166","2022_06_14_130505_add_sale_id_to_returns_table","106");
INSERT INTO migrations VALUES("167","2022_07_19_115504_add_variant_data_to_products_table","107");
INSERT INTO migrations VALUES("168","2022_07_25_194300_add_additional_cost_to_product_variants_table","108");
INSERT INTO migrations VALUES("169","2022_09_04_195610_add_purchase_id_to_return_purchases_table","108");
INSERT INTO migrations VALUES("171","2023_10_20_205358_create_ip_tv_settings_table","109");
INSERT INTO migrations VALUES("172","2023_10_21_191743_create_ip_tv_apps_table","109");
INSERT INTO migrations VALUES("173","2023_10_25_044410_create_subcription_descriptions_table","110");
INSERT INTO migrations VALUES("174","2023_10_21_041520_create_plans_table","111");



CREATE TABLE `money_transfers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO notifications VALUES("cdd5dd83-32cb-408a-b4d0-ad1ca5ada682","App\Notifications\SendNotification","App\User","36","{"sender_id":"1","receiver_id":"36","document_name":"20231030082613.pdf","message":"Certainly! Here's a brief welcome notification in plain text:\r\n\r\n\"Welcome to !\r\n\r\nWe're excited to have you here. Here are some quick tips to help you get started:\r\n\r\nComplete your profile: Add a profile picture and some basic information to personalize your account.\r\n\r\nExplore our features: Take a tour of our platform to discover all the great things you can do here.\r\n\r\nNeed help? Our support team is ready to assist you with any questions or issues.\r\n\r\nFeel free to start exploring and make the most of your experience. If you have any questions, just reach out. Enjoy!\""}","","2023-10-30 20:26:14","2023-10-30 20:26:14");



CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `payment_with_cheque` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `cheque_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `payment_with_credit_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_id` varchar(191) DEFAULT NULL,
  `charge_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `payment_with_gift_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `payment_with_paypal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_reference` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `used_points` double DEFAULT NULL,
  `change` double NOT NULL,
  `paying_method` varchar(191) NOT NULL,
  `payment_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO payments VALUES("1","ppr-20220731-073645","1","1","","","5","8300","","0","Cash","","2022-07-31 18:36:45","2022-07-31 18:36:45");
INSERT INTO payments VALUES("2","spr-20220731-074532","1","","1","","5","1773","","1000","Cash","","2022-07-31 18:45:32","2022-07-31 21:21:29");
INSERT INTO payments VALUES("3","spr-20220731-103409","1","","2","","5","1800","","0","Gift Card","","2022-07-31 21:34:09","2022-07-31 21:34:09");
INSERT INTO payments VALUES("4","spr-20220731-103413","1","","3","","5","1800","","0","Gift Card","","2022-07-31 21:34:13","2022-07-31 21:34:13");
INSERT INTO payments VALUES("5","spr-20230820-020335","1","","5","1","5","820","","0","Cash","","2023-08-20 02:03:35","2023-08-20 02:03:35");
INSERT INTO payments VALUES("6","spr-20230904-094951","1","","6","2","5","880","","0","Cash","","2023-09-04 09:49:51","2023-09-04 09:49:51");



CREATE TABLE `payrolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paying_method` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO permissions VALUES("4","products-edit","web","2018-06-03 19:00:09","2018-06-03 19:00:09");
INSERT INTO permissions VALUES("5","products-delete","web","2018-06-04 16:54:22","2018-06-04 16:54:22");
INSERT INTO permissions VALUES("6","products-add","web","2018-06-04 18:34:14","2018-06-04 18:34:14");
INSERT INTO permissions VALUES("7","products-index","web","2018-06-04 21:34:27","2018-06-04 21:34:27");
INSERT INTO permissions VALUES("8","purchases-index","web","2018-06-05 02:03:19","2018-06-05 02:03:19");
INSERT INTO permissions VALUES("9","purchases-add","web","2018-06-05 02:12:25","2018-06-05 02:12:25");
INSERT INTO permissions VALUES("10","purchases-edit","web","2018-06-05 03:47:36","2018-06-05 03:47:36");
INSERT INTO permissions VALUES("11","purchases-delete","web","2018-06-05 03:47:36","2018-06-05 03:47:36");
INSERT INTO permissions VALUES("12","sales-index","web","2018-06-05 04:49:08","2018-06-05 04:49:08");
INSERT INTO permissions VALUES("13","sales-add","web","2018-06-05 04:49:52","2018-06-05 04:49:52");
INSERT INTO permissions VALUES("14","sales-edit","web","2018-06-05 04:49:52","2018-06-05 04:49:52");
INSERT INTO permissions VALUES("15","sales-delete","web","2018-06-05 04:49:53","2018-06-05 04:49:53");
INSERT INTO permissions VALUES("16","quotes-index","web","2018-06-05 16:05:10","2018-06-05 16:05:10");
INSERT INTO permissions VALUES("17","quotes-add","web","2018-06-05 16:05:10","2018-06-05 16:05:10");
INSERT INTO permissions VALUES("18","quotes-edit","web","2018-06-05 16:05:10","2018-06-05 16:05:10");
INSERT INTO permissions VALUES("19","quotes-delete","web","2018-06-05 16:05:10","2018-06-05 16:05:10");
INSERT INTO permissions VALUES("20","transfers-index","web","2018-06-05 16:30:03","2018-06-05 16:30:03");
INSERT INTO permissions VALUES("21","transfers-add","web","2018-06-05 16:30:03","2018-06-05 16:30:03");
INSERT INTO permissions VALUES("22","transfers-edit","web","2018-06-05 16:30:03","2018-06-05 16:30:03");
INSERT INTO permissions VALUES("23","transfers-delete","web","2018-06-05 16:30:03","2018-06-05 16:30:03");
INSERT INTO permissions VALUES("24","returns-index","web","2018-06-05 16:50:24","2018-06-05 16:50:24");
INSERT INTO permissions VALUES("25","returns-add","web","2018-06-05 16:50:24","2018-06-05 16:50:24");
INSERT INTO permissions VALUES("26","returns-edit","web","2018-06-05 16:50:25","2018-06-05 16:50:25");
INSERT INTO permissions VALUES("27","returns-delete","web","2018-06-05 16:50:25","2018-06-05 16:50:25");
INSERT INTO permissions VALUES("28","customers-index","web","2018-06-05 17:15:54","2018-06-05 17:15:54");
INSERT INTO permissions VALUES("29","customers-add","web","2018-06-05 17:15:55","2018-06-05 17:15:55");
INSERT INTO permissions VALUES("30","customers-edit","web","2018-06-05 17:15:55","2018-06-05 17:15:55");
INSERT INTO permissions VALUES("31","customers-delete","web","2018-06-05 17:15:55","2018-06-05 17:15:55");
INSERT INTO permissions VALUES("32","suppliers-index","web","2018-06-05 17:40:12","2018-06-05 17:40:12");
INSERT INTO permissions VALUES("33","suppliers-add","web","2018-06-05 17:40:12","2018-06-05 17:40:12");
INSERT INTO permissions VALUES("34","suppliers-edit","web","2018-06-05 17:40:12","2018-06-05 17:40:12");
INSERT INTO permissions VALUES("35","suppliers-delete","web","2018-06-05 17:40:12","2018-06-05 17:40:12");
INSERT INTO permissions VALUES("36","product-report","web","2018-06-25 17:05:33","2018-06-25 17:05:33");
INSERT INTO permissions VALUES("37","purchase-report","web","2018-06-25 17:24:56","2018-06-25 17:24:56");
INSERT INTO permissions VALUES("38","sale-report","web","2018-06-25 17:33:13","2018-06-25 17:33:13");
INSERT INTO permissions VALUES("39","customer-report","web","2018-06-25 17:36:51","2018-06-25 17:36:51");
INSERT INTO permissions VALUES("40","due-report","web","2018-06-25 17:39:52","2018-06-25 17:39:52");
INSERT INTO permissions VALUES("41","users-index","web","2018-06-25 18:00:10","2018-06-25 18:00:10");
INSERT INTO permissions VALUES("42","users-add","web","2018-06-25 18:00:10","2018-06-25 18:00:10");
INSERT INTO permissions VALUES("43","users-edit","web","2018-06-25 18:01:30","2018-06-25 18:01:30");
INSERT INTO permissions VALUES("44","users-delete","web","2018-06-25 18:01:30","2018-06-25 18:01:30");
INSERT INTO permissions VALUES("45","profit-loss","web","2018-07-15 15:50:05","2018-07-15 15:50:05");
INSERT INTO permissions VALUES("46","best-seller","web","2018-07-15 16:01:38","2018-07-15 16:01:38");
INSERT INTO permissions VALUES("47","daily-sale","web","2018-07-15 16:24:21","2018-07-15 16:24:21");
INSERT INTO permissions VALUES("48","monthly-sale","web","2018-07-15 16:30:41","2018-07-15 16:30:41");
INSERT INTO permissions VALUES("49","daily-purchase","web","2018-07-15 16:36:46","2018-07-15 16:36:46");
INSERT INTO permissions VALUES("50","monthly-purchase","web","2018-07-15 16:48:17","2018-07-15 16:48:17");
INSERT INTO permissions VALUES("51","payment-report","web","2018-07-15 17:10:41","2018-07-15 17:10:41");
INSERT INTO permissions VALUES("52","warehouse-stock-report","web","2018-07-15 17:16:55","2018-07-15 17:16:55");
INSERT INTO permissions VALUES("53","product-qty-alert","web","2018-07-15 17:33:21","2018-07-15 17:33:21");
INSERT INTO permissions VALUES("54","supplier-report","web","2018-07-30 21:00:01","2018-07-30 21:00:01");
INSERT INTO permissions VALUES("55","expenses-index","web","2018-09-05 19:07:10","2018-09-05 19:07:10");
INSERT INTO permissions VALUES("56","expenses-add","web","2018-09-05 19:07:10","2018-09-05 19:07:10");
INSERT INTO permissions VALUES("57","expenses-edit","web","2018-09-05 19:07:10","2018-09-05 19:07:10");
INSERT INTO permissions VALUES("58","expenses-delete","web","2018-09-05 19:07:11","2018-09-05 19:07:11");
INSERT INTO permissions VALUES("59","general_setting","web","2018-10-20 17:10:04","2018-10-20 17:10:04");
INSERT INTO permissions VALUES("60","mail_setting","web","2018-10-20 17:10:04","2018-10-20 17:10:04");
INSERT INTO permissions VALUES("61","pos_setting","web","2018-10-20 17:10:04","2018-10-20 17:10:04");
INSERT INTO permissions VALUES("62","hrm_setting","web","2019-01-03 04:30:23","2019-01-03 04:30:23");
INSERT INTO permissions VALUES("63","purchase-return-index","web","2019-01-03 15:45:14","2019-01-03 15:45:14");
INSERT INTO permissions VALUES("64","purchase-return-add","web","2019-01-03 15:45:14","2019-01-03 15:45:14");
INSERT INTO permissions VALUES("65","purchase-return-edit","web","2019-01-03 15:45:14","2019-01-03 15:45:14");
INSERT INTO permissions VALUES("66","purchase-return-delete","web","2019-01-03 15:45:14","2019-01-03 15:45:14");
INSERT INTO permissions VALUES("67","account-index","web","2019-01-03 16:06:13","2019-01-03 16:06:13");
INSERT INTO permissions VALUES("68","balance-sheet","web","2019-01-03 16:06:14","2019-01-03 16:06:14");
INSERT INTO permissions VALUES("69","account-statement","web","2019-01-03 16:06:14","2019-01-03 16:06:14");
INSERT INTO permissions VALUES("70","department","web","2019-01-03 16:30:01","2019-01-03 16:30:01");
INSERT INTO permissions VALUES("71","attendance","web","2019-01-03 16:30:01","2019-01-03 16:30:01");
INSERT INTO permissions VALUES("72","payroll","web","2019-01-03 16:30:01","2019-01-03 16:30:01");
INSERT INTO permissions VALUES("73","employees-index","web","2019-01-03 16:52:19","2019-01-03 16:52:19");
INSERT INTO permissions VALUES("74","employees-add","web","2019-01-03 16:52:19","2019-01-03 16:52:19");
INSERT INTO permissions VALUES("75","employees-edit","web","2019-01-03 16:52:19","2019-01-03 16:52:19");
INSERT INTO permissions VALUES("76","employees-delete","web","2019-01-03 16:52:19","2019-01-03 16:52:19");
INSERT INTO permissions VALUES("77","user-report","web","2019-01-17 00:48:18","2019-01-17 00:48:18");
INSERT INTO permissions VALUES("78","stock_count","web","2019-02-18 04:32:01","2019-02-18 04:32:01");
INSERT INTO permissions VALUES("79","adjustment","web","2019-02-18 04:32:02","2019-02-18 04:32:02");
INSERT INTO permissions VALUES("80","sms_setting","web","2019-02-22 23:18:03","2019-02-22 23:18:03");
INSERT INTO permissions VALUES("81","create_sms","web","2019-02-22 23:18:03","2019-02-22 23:18:03");
INSERT INTO permissions VALUES("82","print_barcode","web","2019-03-07 23:02:19","2019-03-07 23:02:19");
INSERT INTO permissions VALUES("83","empty_database","web","2019-03-07 23:02:19","2019-03-07 23:02:19");
INSERT INTO permissions VALUES("84","customer_group","web","2019-03-07 23:37:15","2019-03-07 23:37:15");
INSERT INTO permissions VALUES("85","unit","web","2019-03-07 23:37:15","2019-03-07 23:37:15");
INSERT INTO permissions VALUES("86","tax","web","2019-03-07 23:37:15","2019-03-07 23:37:15");
INSERT INTO permissions VALUES("87","gift_card","web","2019-03-08 00:29:38","2019-03-08 00:29:38");
INSERT INTO permissions VALUES("88","coupon","web","2019-03-08 00:29:38","2019-03-08 00:29:38");
INSERT INTO permissions VALUES("89","holiday","web","2019-10-20 02:57:15","2019-10-20 02:57:15");
INSERT INTO permissions VALUES("90","warehouse-report","web","2019-10-23 00:00:23","2019-10-23 00:00:23");
INSERT INTO permissions VALUES("91","warehouse","web","2020-02-27 00:47:32","2020-02-27 00:47:32");
INSERT INTO permissions VALUES("92","brand","web","2020-02-27 00:59:59","2020-02-27 00:59:59");
INSERT INTO permissions VALUES("93","billers-index","web","2020-02-27 01:11:15","2020-02-27 01:11:15");
INSERT INTO permissions VALUES("94","billers-add","web","2020-02-27 01:11:15","2020-02-27 01:11:15");
INSERT INTO permissions VALUES("95","billers-edit","web","2020-02-27 01:11:15","2020-02-27 01:11:15");
INSERT INTO permissions VALUES("96","billers-delete","web","2020-02-27 01:11:15","2020-02-27 01:11:15");
INSERT INTO permissions VALUES("97","money-transfer","web","2020-03-02 23:41:48","2020-03-02 23:41:48");
INSERT INTO permissions VALUES("98","category","web","2020-07-14 06:13:16","2020-07-14 06:13:16");
INSERT INTO permissions VALUES("99","delivery","web","2020-07-14 06:13:16","2020-07-14 06:13:16");
INSERT INTO permissions VALUES("100","send_notification","web","2020-11-01 00:21:31","2020-11-01 00:21:31");
INSERT INTO permissions VALUES("101","today_sale","web","2020-11-01 00:57:04","2020-11-01 00:57:04");
INSERT INTO permissions VALUES("102","today_profit","web","2020-11-01 00:57:04","2020-11-01 00:57:04");
INSERT INTO permissions VALUES("103","currency","web","2020-11-09 18:23:11","2020-11-09 18:23:11");
INSERT INTO permissions VALUES("104","backup_database","web","2020-11-15 18:16:55","2020-11-15 18:16:55");
INSERT INTO permissions VALUES("105","reward_point_setting","web","2021-06-27 22:34:42","2021-06-27 22:34:42");
INSERT INTO permissions VALUES("106","revenue_profit_summary","web","2022-02-09 07:57:21","2022-02-09 07:57:21");
INSERT INTO permissions VALUES("107","cash_flow","web","2022-02-09 07:57:22","2022-02-09 07:57:22");
INSERT INTO permissions VALUES("108","monthly_summary","web","2022-02-09 07:57:22","2022-02-09 07:57:22");
INSERT INTO permissions VALUES("109","yearly_report","web","2022-02-09 07:57:22","2022-02-09 07:57:22");
INSERT INTO permissions VALUES("110","discount_plan","web","2022-02-17 03:12:26","2022-02-17 03:12:26");
INSERT INTO permissions VALUES("111","discount","web","2022-02-17 03:12:38","2022-02-17 03:12:38");
INSERT INTO permissions VALUES("112","product-expiry-report","web","2022-03-30 23:39:20","2022-03-30 23:39:20");
INSERT INTO permissions VALUES("113","purchase-payment-index","web","2022-06-06 08:12:27","2022-06-06 08:12:27");
INSERT INTO permissions VALUES("114","purchase-payment-add","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("115","purchase-payment-edit","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("116","purchase-payment-delete","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("117","sale-payment-index","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("118","sale-payment-add","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("119","sale-payment-edit","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("120","sale-payment-delete","web","2022-06-06 08:12:28","2022-06-06 08:12:28");
INSERT INTO permissions VALUES("121","all_notification","web","2022-06-06 08:12:29","2022-06-06 08:12:29");
INSERT INTO permissions VALUES("122","sale-report-chart","web","2022-06-06 08:12:29","2022-06-06 08:12:29");
INSERT INTO permissions VALUES("123","dso-report","web","2022-06-06 08:12:29","2022-06-06 08:12:29");
INSERT INTO permissions VALUES("124","subcription-index","web","2022-06-06 08:12:29","2022-06-06 08:12:29");
INSERT INTO permissions VALUES("125","subscription","edit","2023-11-02 14:03:50","2023-11-02 14:03:50");



CREATE TABLE `plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `subscription` varchar(191) NOT NULL,
  `interval_count` tinyint(4) DEFAULT NULL,
  `price` varchar(191) NOT NULL,
  `currency` varchar(191) NOT NULL DEFAULT 'usd',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO plans VALUES("17","plan_Oulow5GeoYd3lg","Basic Plan","","month","1","39.99","usd","1","2023-10-30 20:17:14","2023-10-30 20:17:14");
INSERT INTO plans VALUES("18","plan_Oulqq8SZdAOTxc","Premium Plan","","month","3","49.99","usd","1","2023-10-30 20:18:37","2023-10-30 20:18:37");
INSERT INTO plans VALUES("19","plan_OulrH4ii8Eqccc","Ultra Plan","","month","6","59.99","usd","1","2023-10-30 20:19:30","2023-10-30 20:19:30");
INSERT INTO plans VALUES("20","plan_Oulszrvj8psxyk","Free Plan","","week","1","0","usd","0","2023-10-30 20:20:28","2023-10-31 12:42:38");



CREATE TABLE `pos_setting` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `product_number` int(11) NOT NULL,
  `keybord_active` tinyint(1) NOT NULL,
  `stripe_public_key` varchar(191) DEFAULT NULL,
  `stripe_secret_key` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `pos_setting_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pos_setting VALUES("1","1","1","1","4","0","pk_test_ITN7KOYiIsHSCQ0UMRcgaYUB","sk_test_TtQQaawhEYRwa3mU9CzttrEy","2018-09-02 21:17:04","2022-07-16 14:48:25");



CREATE TABLE `product_adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `action` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_adjustments VALUES("1","1","1","","1","+","2022-07-31 21:19:08","2022-07-31 21:19:08");



CREATE TABLE `product_batches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `batch_no` varchar(191) NOT NULL,
  `expired_date` date NOT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `product_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `recieved` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_purchases VALUES("1","1","1","","","","10","10","1","800","0","0","0","8000","2022-07-31 18:21:45","2022-07-31 18:21:45");
INSERT INTO product_purchases VALUES("2","2","2","","","","1","1","1","400","0","0","0","400","2023-10-29 16:06:34","2023-10-29 16:06:34");



CREATE TABLE `product_quotation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `product_returns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_returns VALUES("1","1","1","","","","1","1","900","0","0","0","900","2022-07-31 18:48:30","2022-07-31 18:48:30");



CREATE TABLE `product_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_sales VALUES("1","1","1","","","","3","1","900","0","0","0","2700","2022-07-31 18:43:39","2022-07-31 18:43:39");
INSERT INTO product_sales VALUES("5","5","1","","","","1","1","900","0","0","0","900","2023-08-20 02:03:21","2023-08-20 02:03:21");
INSERT INTO product_sales VALUES("6","6","1","","","","1","1","900","0","0","0","900","2023-09-04 09:49:44","2023-09-04 09:49:44");



CREATE TABLE `product_transfer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `product_variants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `item_code` varchar(191) NOT NULL,
  `additional_cost` double DEFAULT NULL,
  `additional_price` double DEFAULT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `product_warehouse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(191) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_warehouse VALUES("1","1","","","","1","7","","2022-07-31 18:21:45","2023-09-04 09:49:44");
INSERT INTO product_warehouse VALUES("2","2","","","","1","1","","2023-10-29 16:06:34","2023-10-29 16:06:34");



CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `barcode_symbology` varchar(191) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `qty` double DEFAULT NULL,
  `alert_quantity` double DEFAULT NULL,
  `daily_sale_objective` double DEFAULT NULL,
  `promotion` tinyint(4) DEFAULT NULL,
  `promotion_price` varchar(191) DEFAULT NULL,
  `starting_date` varchar(200) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_method` int(11) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `is_embeded` tinyint(1) DEFAULT NULL,
  `is_variant` tinyint(1) DEFAULT NULL,
  `is_batch` tinyint(1) DEFAULT NULL,
  `is_diffPrice` tinyint(1) DEFAULT NULL,
  `is_imei` tinyint(1) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `product_list` varchar(191) DEFAULT NULL,
  `variant_list` varchar(191) DEFAULT NULL,
  `qty_list` varchar(191) DEFAULT NULL,
  `price_list` varchar(191) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `variant_option` text DEFAULT NULL,
  `variant_value` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_serialization` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","iPhoneX","99265514","standard","C128","1","1","1","1","1","800","1000","7","","","","","","","","2","202207311136192.jpg","","0","","","0","","1","","","","","","","","1","2022-07-31 18:18:28","2023-09-04 09:49:44","0");
INSERT INTO products VALUES("2","iPhone11","54733219","standard","C128","1","1","1","1","1","400","600","11","","","","","","","","1","zummXD2dvAtI.png","","1","","","0","1","0","","","","","","","","1","2022-07-31 22:38:57","2023-10-29 16:06:34","0");
INSERT INTO products VALUES("3","Samsung A22","67620129","standard","C128","2","1","1","1","1","10000","10000","100","10","1000","","","","","","1","1693736311188carbon.png","","1","","","","1","1","","","","","<p>Product Details</p>","","","1","2023-09-03 16:18:50","2023-09-03 16:18:50","0");



CREATE TABLE `purchase_product_return` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO purchases VALUES("1","pr-20220731-072145","1","1","1","1","10","0","0","8000","0","0","200","500","8300","8300","1","2","","","2022-07-31 18:21:45","2022-07-31 18:36:45");
INSERT INTO purchases VALUES("2","pr-20231029-040634","1","1","1","1","1","0","0","400","0","0","","","400","0","1","1","","","2023-10-29 16:06:34","2023-10-29 16:06:34");



CREATE TABLE `quotations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `quotation_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `return_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `return_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `returns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `return_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO returns VALUES("1","rr-20220731-074830","1","1","","1","1","1","5","1","1","0","0","900","0","0","900","","","","2022-07-31 18:48:30","2022-07-31 18:48:30");



CREATE TABLE `reward_point_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `per_point_amount` double NOT NULL,
  `minimum_amount` double NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO reward_point_settings VALUES("1","300","1000","1","Year","1","2021-06-09 09:40:15","2022-07-31 17:29:38");



CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO role_has_permissions VALUES("4","1");
INSERT INTO role_has_permissions VALUES("4","2");
INSERT INTO role_has_permissions VALUES("4","4");
INSERT INTO role_has_permissions VALUES("5","1");
INSERT INTO role_has_permissions VALUES("5","2");
INSERT INTO role_has_permissions VALUES("6","1");
INSERT INTO role_has_permissions VALUES("6","2");
INSERT INTO role_has_permissions VALUES("6","4");
INSERT INTO role_has_permissions VALUES("7","1");
INSERT INTO role_has_permissions VALUES("7","2");
INSERT INTO role_has_permissions VALUES("7","4");
INSERT INTO role_has_permissions VALUES("8","1");
INSERT INTO role_has_permissions VALUES("8","2");
INSERT INTO role_has_permissions VALUES("8","4");
INSERT INTO role_has_permissions VALUES("9","1");
INSERT INTO role_has_permissions VALUES("9","2");
INSERT INTO role_has_permissions VALUES("9","4");
INSERT INTO role_has_permissions VALUES("10","1");
INSERT INTO role_has_permissions VALUES("10","2");
INSERT INTO role_has_permissions VALUES("11","1");
INSERT INTO role_has_permissions VALUES("11","2");
INSERT INTO role_has_permissions VALUES("12","1");
INSERT INTO role_has_permissions VALUES("12","2");
INSERT INTO role_has_permissions VALUES("12","4");
INSERT INTO role_has_permissions VALUES("13","1");
INSERT INTO role_has_permissions VALUES("13","2");
INSERT INTO role_has_permissions VALUES("13","4");
INSERT INTO role_has_permissions VALUES("14","1");
INSERT INTO role_has_permissions VALUES("14","2");
INSERT INTO role_has_permissions VALUES("15","1");
INSERT INTO role_has_permissions VALUES("15","2");
INSERT INTO role_has_permissions VALUES("16","1");
INSERT INTO role_has_permissions VALUES("16","2");
INSERT INTO role_has_permissions VALUES("17","1");
INSERT INTO role_has_permissions VALUES("17","2");
INSERT INTO role_has_permissions VALUES("18","1");
INSERT INTO role_has_permissions VALUES("18","2");
INSERT INTO role_has_permissions VALUES("19","1");
INSERT INTO role_has_permissions VALUES("19","2");
INSERT INTO role_has_permissions VALUES("20","1");
INSERT INTO role_has_permissions VALUES("20","2");
INSERT INTO role_has_permissions VALUES("20","4");
INSERT INTO role_has_permissions VALUES("21","1");
INSERT INTO role_has_permissions VALUES("21","2");
INSERT INTO role_has_permissions VALUES("21","4");
INSERT INTO role_has_permissions VALUES("22","1");
INSERT INTO role_has_permissions VALUES("22","2");
INSERT INTO role_has_permissions VALUES("22","4");
INSERT INTO role_has_permissions VALUES("23","1");
INSERT INTO role_has_permissions VALUES("23","2");
INSERT INTO role_has_permissions VALUES("24","1");
INSERT INTO role_has_permissions VALUES("24","2");
INSERT INTO role_has_permissions VALUES("24","4");
INSERT INTO role_has_permissions VALUES("25","1");
INSERT INTO role_has_permissions VALUES("25","2");
INSERT INTO role_has_permissions VALUES("25","4");
INSERT INTO role_has_permissions VALUES("26","1");
INSERT INTO role_has_permissions VALUES("26","2");
INSERT INTO role_has_permissions VALUES("27","1");
INSERT INTO role_has_permissions VALUES("27","2");
INSERT INTO role_has_permissions VALUES("28","1");
INSERT INTO role_has_permissions VALUES("28","2");
INSERT INTO role_has_permissions VALUES("28","4");
INSERT INTO role_has_permissions VALUES("29","1");
INSERT INTO role_has_permissions VALUES("29","2");
INSERT INTO role_has_permissions VALUES("29","4");
INSERT INTO role_has_permissions VALUES("30","1");
INSERT INTO role_has_permissions VALUES("30","2");
INSERT INTO role_has_permissions VALUES("31","1");
INSERT INTO role_has_permissions VALUES("31","2");
INSERT INTO role_has_permissions VALUES("32","1");
INSERT INTO role_has_permissions VALUES("32","2");
INSERT INTO role_has_permissions VALUES("33","1");
INSERT INTO role_has_permissions VALUES("33","2");
INSERT INTO role_has_permissions VALUES("34","1");
INSERT INTO role_has_permissions VALUES("34","2");
INSERT INTO role_has_permissions VALUES("35","1");
INSERT INTO role_has_permissions VALUES("35","2");
INSERT INTO role_has_permissions VALUES("36","1");
INSERT INTO role_has_permissions VALUES("36","2");
INSERT INTO role_has_permissions VALUES("37","1");
INSERT INTO role_has_permissions VALUES("37","2");
INSERT INTO role_has_permissions VALUES("38","1");
INSERT INTO role_has_permissions VALUES("38","2");
INSERT INTO role_has_permissions VALUES("39","1");
INSERT INTO role_has_permissions VALUES("39","2");
INSERT INTO role_has_permissions VALUES("40","1");
INSERT INTO role_has_permissions VALUES("40","2");
INSERT INTO role_has_permissions VALUES("41","1");
INSERT INTO role_has_permissions VALUES("41","2");
INSERT INTO role_has_permissions VALUES("42","1");
INSERT INTO role_has_permissions VALUES("42","2");
INSERT INTO role_has_permissions VALUES("43","1");
INSERT INTO role_has_permissions VALUES("43","2");
INSERT INTO role_has_permissions VALUES("44","1");
INSERT INTO role_has_permissions VALUES("44","2");
INSERT INTO role_has_permissions VALUES("45","1");
INSERT INTO role_has_permissions VALUES("45","2");
INSERT INTO role_has_permissions VALUES("46","1");
INSERT INTO role_has_permissions VALUES("46","2");
INSERT INTO role_has_permissions VALUES("47","1");
INSERT INTO role_has_permissions VALUES("47","2");
INSERT INTO role_has_permissions VALUES("48","1");
INSERT INTO role_has_permissions VALUES("48","2");
INSERT INTO role_has_permissions VALUES("49","1");
INSERT INTO role_has_permissions VALUES("49","2");
INSERT INTO role_has_permissions VALUES("50","1");
INSERT INTO role_has_permissions VALUES("50","2");
INSERT INTO role_has_permissions VALUES("51","1");
INSERT INTO role_has_permissions VALUES("51","2");
INSERT INTO role_has_permissions VALUES("52","1");
INSERT INTO role_has_permissions VALUES("52","2");
INSERT INTO role_has_permissions VALUES("53","1");
INSERT INTO role_has_permissions VALUES("53","2");
INSERT INTO role_has_permissions VALUES("54","1");
INSERT INTO role_has_permissions VALUES("54","2");
INSERT INTO role_has_permissions VALUES("55","1");
INSERT INTO role_has_permissions VALUES("55","2");
INSERT INTO role_has_permissions VALUES("55","4");
INSERT INTO role_has_permissions VALUES("56","1");
INSERT INTO role_has_permissions VALUES("56","2");
INSERT INTO role_has_permissions VALUES("56","4");
INSERT INTO role_has_permissions VALUES("57","1");
INSERT INTO role_has_permissions VALUES("57","2");
INSERT INTO role_has_permissions VALUES("57","4");
INSERT INTO role_has_permissions VALUES("58","1");
INSERT INTO role_has_permissions VALUES("58","2");
INSERT INTO role_has_permissions VALUES("59","1");
INSERT INTO role_has_permissions VALUES("59","2");
INSERT INTO role_has_permissions VALUES("60","1");
INSERT INTO role_has_permissions VALUES("60","2");
INSERT INTO role_has_permissions VALUES("61","1");
INSERT INTO role_has_permissions VALUES("61","2");
INSERT INTO role_has_permissions VALUES("62","1");
INSERT INTO role_has_permissions VALUES("62","2");
INSERT INTO role_has_permissions VALUES("63","1");
INSERT INTO role_has_permissions VALUES("63","2");
INSERT INTO role_has_permissions VALUES("63","4");
INSERT INTO role_has_permissions VALUES("64","1");
INSERT INTO role_has_permissions VALUES("64","2");
INSERT INTO role_has_permissions VALUES("64","4");
INSERT INTO role_has_permissions VALUES("65","1");
INSERT INTO role_has_permissions VALUES("65","2");
INSERT INTO role_has_permissions VALUES("66","1");
INSERT INTO role_has_permissions VALUES("66","2");
INSERT INTO role_has_permissions VALUES("67","1");
INSERT INTO role_has_permissions VALUES("67","2");
INSERT INTO role_has_permissions VALUES("68","1");
INSERT INTO role_has_permissions VALUES("68","2");
INSERT INTO role_has_permissions VALUES("69","1");
INSERT INTO role_has_permissions VALUES("69","2");
INSERT INTO role_has_permissions VALUES("70","1");
INSERT INTO role_has_permissions VALUES("70","2");
INSERT INTO role_has_permissions VALUES("71","1");
INSERT INTO role_has_permissions VALUES("71","2");
INSERT INTO role_has_permissions VALUES("72","1");
INSERT INTO role_has_permissions VALUES("72","2");
INSERT INTO role_has_permissions VALUES("73","1");
INSERT INTO role_has_permissions VALUES("73","2");
INSERT INTO role_has_permissions VALUES("74","1");
INSERT INTO role_has_permissions VALUES("74","2");
INSERT INTO role_has_permissions VALUES("75","1");
INSERT INTO role_has_permissions VALUES("75","2");
INSERT INTO role_has_permissions VALUES("76","1");
INSERT INTO role_has_permissions VALUES("76","2");
INSERT INTO role_has_permissions VALUES("77","1");
INSERT INTO role_has_permissions VALUES("77","2");
INSERT INTO role_has_permissions VALUES("78","1");
INSERT INTO role_has_permissions VALUES("78","2");
INSERT INTO role_has_permissions VALUES("79","1");
INSERT INTO role_has_permissions VALUES("79","2");
INSERT INTO role_has_permissions VALUES("80","1");
INSERT INTO role_has_permissions VALUES("80","2");
INSERT INTO role_has_permissions VALUES("81","1");
INSERT INTO role_has_permissions VALUES("81","2");
INSERT INTO role_has_permissions VALUES("82","1");
INSERT INTO role_has_permissions VALUES("82","2");
INSERT INTO role_has_permissions VALUES("83","1");
INSERT INTO role_has_permissions VALUES("83","2");
INSERT INTO role_has_permissions VALUES("84","1");
INSERT INTO role_has_permissions VALUES("84","2");
INSERT INTO role_has_permissions VALUES("85","1");
INSERT INTO role_has_permissions VALUES("85","2");
INSERT INTO role_has_permissions VALUES("86","1");
INSERT INTO role_has_permissions VALUES("86","2");
INSERT INTO role_has_permissions VALUES("87","1");
INSERT INTO role_has_permissions VALUES("87","2");
INSERT INTO role_has_permissions VALUES("88","1");
INSERT INTO role_has_permissions VALUES("88","2");
INSERT INTO role_has_permissions VALUES("89","1");
INSERT INTO role_has_permissions VALUES("89","2");
INSERT INTO role_has_permissions VALUES("90","1");
INSERT INTO role_has_permissions VALUES("90","2");
INSERT INTO role_has_permissions VALUES("91","1");
INSERT INTO role_has_permissions VALUES("91","2");
INSERT INTO role_has_permissions VALUES("92","1");
INSERT INTO role_has_permissions VALUES("92","2");
INSERT INTO role_has_permissions VALUES("93","1");
INSERT INTO role_has_permissions VALUES("93","2");
INSERT INTO role_has_permissions VALUES("94","1");
INSERT INTO role_has_permissions VALUES("94","2");
INSERT INTO role_has_permissions VALUES("95","1");
INSERT INTO role_has_permissions VALUES("95","2");
INSERT INTO role_has_permissions VALUES("96","1");
INSERT INTO role_has_permissions VALUES("96","2");
INSERT INTO role_has_permissions VALUES("97","1");
INSERT INTO role_has_permissions VALUES("97","2");
INSERT INTO role_has_permissions VALUES("98","1");
INSERT INTO role_has_permissions VALUES("98","2");
INSERT INTO role_has_permissions VALUES("99","1");
INSERT INTO role_has_permissions VALUES("99","2");
INSERT INTO role_has_permissions VALUES("100","1");
INSERT INTO role_has_permissions VALUES("100","2");
INSERT INTO role_has_permissions VALUES("101","1");
INSERT INTO role_has_permissions VALUES("101","2");
INSERT INTO role_has_permissions VALUES("102","1");
INSERT INTO role_has_permissions VALUES("102","2");
INSERT INTO role_has_permissions VALUES("103","1");
INSERT INTO role_has_permissions VALUES("103","2");
INSERT INTO role_has_permissions VALUES("104","1");
INSERT INTO role_has_permissions VALUES("104","2");
INSERT INTO role_has_permissions VALUES("105","1");
INSERT INTO role_has_permissions VALUES("105","2");
INSERT INTO role_has_permissions VALUES("106","1");
INSERT INTO role_has_permissions VALUES("107","1");
INSERT INTO role_has_permissions VALUES("108","1");
INSERT INTO role_has_permissions VALUES("109","1");
INSERT INTO role_has_permissions VALUES("110","1");
INSERT INTO role_has_permissions VALUES("111","1");
INSERT INTO role_has_permissions VALUES("112","1");
INSERT INTO role_has_permissions VALUES("113","1");
INSERT INTO role_has_permissions VALUES("114","1");
INSERT INTO role_has_permissions VALUES("115","1");
INSERT INTO role_has_permissions VALUES("116","1");
INSERT INTO role_has_permissions VALUES("117","1");
INSERT INTO role_has_permissions VALUES("118","1");
INSERT INTO role_has_permissions VALUES("119","1");
INSERT INTO role_has_permissions VALUES("120","1");
INSERT INTO role_has_permissions VALUES("121","1");
INSERT INTO role_has_permissions VALUES("122","1");
INSERT INTO role_has_permissions VALUES("123","1");
INSERT INTO role_has_permissions VALUES("124","1");



CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `guard_name` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES("1","Admin","admin can access all data...","web","1","2018-06-02 17:46:44","2022-07-31 15:19:24");
INSERT INTO roles VALUES("2","Owner","Staff of shop","web","1","2018-10-22 20:38:13","2022-07-31 15:19:37");
INSERT INTO roles VALUES("4","staff","staff has specific acess...","web","1","2018-06-02 18:05:27","2022-07-31 15:20:13");
INSERT INTO roles VALUES("5","Customer","","web","1","2020-11-06 00:43:16","2022-07-31 15:20:01");



CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount_type` varchar(191) DEFAULT NULL,
  `order_discount_value` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `sale_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `sale_note` text DEFAULT NULL,
  `staff_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sales VALUES("1","sr-20220731-074339","1","","1","1","1","1","3","0","0","2700","2773","0","0","Percentage","1","27","","","100","1","2","","1773","","","2022-07-31 18:43:39","2022-07-31 21:21:29");
INSERT INTO sales VALUES("2","posr-20220731-103409","1","","1","1","1","1","3","900","0","1800","1800","0","0","Flat","","0","","","","3","4","","1800","","","2022-07-31 21:34:09","2022-07-31 21:34:09");
INSERT INTO sales VALUES("3","posr-20220731-103413","1","","1","1","1","1","3","900","0","1800","1800","0","0","Flat","","0","","","","3","4","","1800","","","2022-07-31 21:34:13","2022-07-31 21:34:13");
INSERT INTO sales VALUES("5","posr-20230820-020321","1","1","1","1","1","1","1","0","0","900","820","0","0","Percentage","10","90","","","10","1","4","","820","","","2023-08-20 00:00:00","2023-08-20 02:03:21");
INSERT INTO sales VALUES("6","posr-20230904-094943","1","2","1","1","1","1","1","0","0","900","880","0","0","Flat","20","20","","","","1","4","","880","","","2023-09-04 09:49:43","2023-09-04 09:49:43");



CREATE TABLE `serials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `cost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `brand_id` int(10) unsigned NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `network` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `condition` varchar(191) DEFAULT NULL,
  `warranty` varchar(191) DEFAULT NULL,
  `serials` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'In Stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO serials VALUES("1","2","400.00","600.00","1","black","2g","264","new","1 Years","7215332661","In Stock","2023-08-26 17:03:40","2023-08-26 17:03:40");
INSERT INTO serials VALUES("2","2","400.00","600.00","1","black","2g","264","new","1 Years","5304379810","In Stock","2023-08-26 17:03:40","2023-08-26 17:03:40");
INSERT INTO serials VALUES("3","2","500.00","600.00","1","black","2g","264","new","1 Years","2073654321","In Stock","2023-08-26 17:03:41","2023-08-31 19:36:08");
INSERT INTO serials VALUES("6","2","400.00","600.00","1","black","5g","264","new","1 Years","6973048428","In Stock","2023-08-26 17:03:41","2023-08-31 21:24:39");
INSERT INTO serials VALUES("7","2","400.00","600.00","1","black","2g","264","new","1 Years","1133469858","In Stock","2023-08-26 17:03:41","2023-08-26 17:03:41");
INSERT INTO serials VALUES("8","2","400.00","600.00","1","black","2g","264","new","1 Years","7118005942","In Stock","2023-08-26 17:03:41","2023-08-26 17:03:41");
INSERT INTO serials VALUES("9","2","400.00","600.00","1","black","2g","264","new","1 Years","5597492435","In Stock","2023-08-26 17:03:41","2023-08-26 17:03:41");
INSERT INTO serials VALUES("10","2","400.00","600.00","1","black","2g","264","new","1 Years","2577931861","In Stock","2023-08-26 17:03:41","2023-08-26 17:03:41");
INSERT INTO serials VALUES("14","2","400.00","600.00","1","","","","","1","11","In Stock","2023-10-30 20:32:38","2023-10-30 20:32:38");



CREATE TABLE `stock_counts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `category_id` varchar(191) DEFAULT NULL,
  `brand_id` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `initial_file` varchar(191) DEFAULT NULL,
  `final_file` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `is_adjusted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO stock_counts VALUES("1","scr-20230826-024123","1","","","1","full","20230826-024123.csv","","","0","2023-08-26 02:41:23","2023-08-26 02:41:23");



CREATE TABLE `subcription_descriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_product` varchar(191) NOT NULL,
  `stripe_price` varchar(191) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subscription_items VALUES("1","1","si_OrVCMg8IrKoThT","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 15:55:14","2023-10-22 15:55:14");
INSERT INTO subscription_items VALUES("2","2","si_OrVFHv3GL9Ze7m","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 15:58:22","2023-10-22 15:58:22");
INSERT INTO subscription_items VALUES("3","3","si_OrVKb76WzLsOci","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:02:35","2023-10-22 16:02:35");
INSERT INTO subscription_items VALUES("4","4","si_OrVNP2bZe3xcbm","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:05:25","2023-10-22 16:05:25");
INSERT INTO subscription_items VALUES("5","5","si_OrVRR7JoM2j3jV","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:09:32","2023-10-22 16:09:32");
INSERT INTO subscription_items VALUES("6","6","si_OrVRUNR1pey1K7","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:10:07","2023-10-22 16:10:07");
INSERT INTO subscription_items VALUES("7","7","si_OrVTyUx2zu4bUs","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:12:18","2023-10-22 16:12:18");
INSERT INTO subscription_items VALUES("8","8","si_OrVx6aGd95SUQI","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-22 16:42:12","2023-10-22 16:42:12");
INSERT INTO subscription_items VALUES("9","9","si_Os6w5Pi8yashhL","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-24 06:55:06","2023-10-24 06:55:06");
INSERT INTO subscription_items VALUES("10","10","si_OsdiswK7SY4wzc","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-25 16:46:31","2023-10-25 16:46:31");
INSERT INTO subscription_items VALUES("11","11","si_OstC0RLONR66uV","prod_OsZ6QNLhh07htY","plan_OsZ6Ddj1KgGNf0","1","2023-10-26 08:47:18","2023-10-26 08:47:18");
INSERT INTO subscription_items VALUES("12","12","si_OtBuVpvjoL4YgC","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-26 15:06:27","2023-10-26 15:06:27");
INSERT INTO subscription_items VALUES("13","13","si_OtBvRSSuBDJ8CR","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-26 15:07:47","2023-10-26 15:07:47");
INSERT INTO subscription_items VALUES("14","14","si_OtBvxKQZ5IcnsE","prod_OrUpZwxBQ6HTPj","plan_OrUpq1c2Zdqc01","1","2023-10-26 15:07:57","2023-10-26 15:07:57");
INSERT INTO subscription_items VALUES("15","15","si_OukBkX2BgdIgRF","prod_Ougsn7V31N94QH","plan_OugsTp8BzMO8pB","1","2023-10-30 18:35:45","2023-10-30 18:35:45");
INSERT INTO subscription_items VALUES("16","16","si_Ouls80X99pJMsb","prod_OulopqYVglSmJX","plan_Oulow5GeoYd3lg","1","2023-10-30 20:21:17","2023-10-30 20:21:17");
INSERT INTO subscription_items VALUES("17","17","si_OultZ2YXegpyQc","prod_Oulqta82ZZK6Fe","plan_Oulqq8SZdAOTxc","1","2023-10-30 20:22:02","2023-10-30 20:22:02");
INSERT INTO subscription_items VALUES("18","18","si_OuluYAVp5cS0ZX","prod_Oulr8VnmBu4eEj","plan_OulrH4ii8Eqccc","1","2023-10-30 20:22:44","2023-10-30 20:22:44");



CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_status` varchar(191) NOT NULL,
  `stripe_price` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subscriptions VALUES("16","1","default","sub_1O6wLAFrZHEzovKOOLi5824a","cancelled","plan_Oulow5GeoYd3lg","1","","","2023-10-30 20:21:17","2023-10-30 20:21:17");
INSERT INTO subscriptions VALUES("17","1","default","sub_1O6wLtFrZHEzovKOydHMTqP7","active","plan_Oulqq8SZdAOTxc","1","","","2023-10-30 20:22:02","2023-10-30 20:22:02");
INSERT INTO subscriptions VALUES("18","1","default","sub_1O6wMZFrZHEzovKO0h9ZpQM3","cancelled","plan_OulrH4ii8Eqccc","1","","","2023-10-30 20:22:44","2023-10-30 21:46:57");



CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) NOT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO suppliers VALUES("1","Bùi Đức Toàn","","AnToanHome","","hero70411@gmail.com","0904422959","58 Tố Hữu","Quận Nam Từ Liêm","Hà Nội","12015","Vietnam","1","2022-07-31 18:17:34","2022-07-31 18:17:34");



CREATE TABLE `taxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `rate` double NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `transfers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(191) NOT NULL,
  `unit_name` varchar(191) NOT NULL,
  `base_unit` int(11) DEFAULT NULL,
  `operator` varchar(191) DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO units VALUES("1","Pcs","Cái","","*","1","1","2022-07-31 18:15:05","2022-07-31 18:15:05");



CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `pm_type` varchar(191) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","admin","admin@admin.com","$2y$10$bAohnTAlLvuIBX5t7i3ZleDVb43D4nEDVyrtX5DHl9B7pxU.AcqOy","2WFWMAmNCyb4O8TccdgdJ7qItXSXOatxiusckYwTbQBKmxwSxNtg83ICP7Gz","5364377","nulled","1","","","1","0","2018-06-02 21:24:15","2023-10-22 15:55:12","cus_OujrEknD8baZ8Q","visa","4242","");
INSERT INTO users VALUES("3","dhiman da","dhiman@gmail.com","$2y$10$Fef6vu5E67nm11hX7V5a2u1ThNCQ6n9DRCvRF9TD7stk.Pmt2R6O.","5ehQM6JIfiQfROgTbB5let0Z93vjLHS7rd9QD5RPNgOxli3xdo7fykU7vtTt","212","lioncoders","1","0","0","0","1","2018-06-14 16:00:31","2020-11-06 01:06:51","","","","");
INSERT INTO users VALUES("6","test","test@gmail.com","$2y$10$aKarGhkcEVDleb66aKEE.eLsXu2Rko.NUQxSbtnbtJJDhHF9eQGJK","KpW1gYYlOFacumklO2IcRfSsbC3KcWUZzOI37gqoqM388Xie6KdhaOHIFEYm","1234","212312","4","0","0","0","1","2018-06-23 21:05:33","2018-06-23 21:13:45","","","","");
INSERT INTO users VALUES("8","test","test@yahoo.com","$2y$10$hlMigidZV0j2/IPkgE/xsOSb8WM2IRlsMv.1hg1NM7kfyd6bGX3hC","","31231","","4","0","0","0","1","2018-06-25 16:35:49","2018-07-02 19:07:39","","","","");
INSERT INTO users VALUES("9","staff","anda@gmail.com","$2y$10$kxDbnynB6mB1e1w3pmtbSOlSxy/WwbLPY5TJpMi0Opao5ezfuQjQm","HUYdFDsg2g1SEUNKVp70hF9RhpiPGEcglq3uk02sjG92M04QacNeV2oWneEZ","3123","","4","5","1","0","1","2018-07-02 19:08:08","2022-07-16 14:37:08","","","","");
INSERT INTO users VALUES("10","abul","abul@alpha.com","$2y$10$5zgB2OOMyNBNVAd.QOQIju5a9fhNnTqPx5H6s4oFlXhNiF6kXEsPq","x7HlttI5bM0vSKViqATaowHFJkLS3PHwfvl7iJdFl5Z1SsyUgWCVbLSgAoi0","1234","anda","1","0","0","0","1","2018-09-08 17:44:48","2022-07-16 14:35:32","","","","");
INSERT INTO users VALUES("11","teststaff","a@a.com","$2y$10$5KNBIIhZzvvZEQEhkHaZGu.Q8bbQNfqYvYgL5N55B8Pb4P5P/b/Li","DkHDEcCA0QLfsKPkUK0ckL0CPM6dPiJytNa0k952gyTbeAyMthW3vi7IRitp","111","aa","4","5","1","0","1","2018-10-22 20:47:56","2018-10-23 20:10:56","","","","");
INSERT INTO users VALUES("12","john","john@gmail.com","$2y$10$P/pN2J/uyTYNzQy2kRqWwuSv7P2f6GE/ykBwtHdda7yci3XsfOKWe","O0f1WJBVjT5eKYl3Js5l1ixMMtoU6kqrH7hbHDx9I1UCcD9CmiSmCBzHbQZg","10001","","4","2","2","0","1","2018-12-30 18:48:37","2019-03-06 22:59:49","","","","");
INSERT INTO users VALUES("13","jjj","test@test.com","$2y$10$/Qx3gHWYWUhlF1aPfzXaCeZA7fRzfSEyCIOnk/dcC4ejO8PsoaalG","","1213","","1","0","0","0","1","2019-01-03 18:08:31","2019-03-03 22:02:29","","","","");
INSERT INTO users VALUES("19","shakalaka","shakalaka@gmail.com","$2y$10$ketLWT0Ib/JXpo00eJlxoeSw.7leS8V1CUGInfbyOWT4F5.Xuo7S2","","1212","Digital image","5","0","0","0","1","2020-11-09 18:07:16","2022-07-16 14:35:32","","","","");
INSERT INTO users VALUES("21","modon","modon@gmail.com","$2y$10$7VpoeGMkP8QCvL5zLwFW..6MYJ5MRumDLDoX.TTQtClS561rpFHY.","","2222","modon company","5","0","0","0","1","2020-11-14 01:12:08","2022-07-16 14:35:32","","","","");
INSERT INTO users VALUES("22","dhiman","dhiman@gmail.com","$2y$10$3mPygsC6wwnDtw/Sg85IpuExtUhgaHx52Lwp7Rz0.FNfuFdfKVpRq","","+8801111111101","lioncoders","5","0","0","0","1","2020-11-16 00:14:58","2022-07-16 14:35:32","","","","");
INSERT INTO users VALUES("31","mbs","mbs@gmail.com","$2y$10$6Ldm1rWEVSrlTmpjIXkeQO9KwWJz/j0FB4U.fY1oCFeax47rvttEK","","2121","","4","1","2","0","1","2021-12-30 00:40:22","2022-07-16 14:35:32","","","","");
INSERT INTO users VALUES("36","Manuel S","msolis@mango.com.gt","$2y$10$YfM/LdEtAN08hoVXiaRRZO.0Wf.fBn0wRnaCSczc50s3bR.7xFliu","","53664377","","1","","","1","0","2022-07-16 13:48:37","2022-07-16 13:48:37","","","","");
INSERT INTO users VALUES("37","gggf","admi@gmail.com","$2y$10$aKarGhkcEVDleb66aKEE.eLsXu2Rko.NUQxSbtnbtJJDhHF9eQGJK","","017500926414444","bb","1","","","0","0","2023-10-22 02:09:16","2023-10-22 02:09:16","","","","");
INSERT INTO users VALUES("38","Azharul","user@gmail.com","$2y$10$bAohnTAlLvuIBX5t7i3ZleDVb43D4nEDVyrtX5DHl9B7pxU.AcqOy","","01444444","jkjkjk","5","","","1","0","2023-10-24 05:53:23","2023-11-02 12:47:41","","","","");



CREATE TABLE `variants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO warehouses VALUES("1","Kho Ecolife","0904422959","hero70411@gmail.com","58 Tố Hữu","1","2022-07-31 18:14:05","2022-07-31 18:14:05");

