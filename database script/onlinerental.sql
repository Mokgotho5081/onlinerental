-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 08:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinerental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '1123', 'You have been registered successfully, you may login.', 'success'),
(2, '4568', 'Unknown error occurred while performing your request', 'danger'),
(3, '0927', 'Email address is already registered', 'warning'),
(4, '0346', 'Invalid email or password', 'danger'),
(5, '9837', 'Your profile have been updated successfully', 'success'),
(6, '9564', 'Password updated successfully', 'success'),
(9, '2305', 'Professional qualification was added successfully', 'success'),
(11, '0521', 'Qualification was deleted successfully', 'success'),
(13, '9367', 'language have been added', 'success'),
(14, '0591', 'Language was deleted successfully', 'success'),
(15, '8763', 'Language have been updated', 'success'),
(16, '6734', 'Professional qualification was updated', 'success'),
(17, '9843', 'Your apartment advert have been posted successfully', 'success'),
(18, '1964', 'Training / Workshop have been added successfully', 'success'),
(20, '9210', 'working experience have been added', 'success'),
(22, '9215', 'working experience updated successfully', 'success'),
(24, '0593', 'working experience was deleted', 'success'),
(26, '9522', 'Training / workshop record have been deleted', 'success'),
(28, '2303', 'Academic qualification have been added successfully', 'success'),
(30, '1521', 'Academic qualification was deleted', 'success'),
(32, '3214', 'Academic qualification have been updated', 'success'),
(34, '2380', 'Referee was added successfully', 'success'),
(36, '7642', 'Referee information have been updated', 'success'),
(38, '0173', 'Job Ad have been deleted', 'success'),
(40, '0369', 'Job Ad has been updated successfully', 'success'),
(42, '2974', 'An error occurred while sending your message', 'danger'),
(43, '5634', 'Your message was sent successfully', 'success'),
(44, '3091', 'You have successfully changed your password', 'success'),
(45, '3591', 'An error occurred while updating your password', 'danger'),
(46, '2290', 'Your certificate size must be less or equal to <strong>1MB</strong>', 'warning'),
(47, '2490', 'Your transcript size must be less or equal to <strong>1MB</strong>', 'warning'),
(48, '5790', 'Training information was updated', 'success'),
(50, '3478', 'Your image size must be less or equal to <strong>1MB</strong>', 'warning'),
(51, '6789', 'Attachment was added successfully', 'success'),
(53, '6784', 'Attachment was deleted successfully', 'success'),
(55, '7764', 'Attachment was updated successfully', 'success'),
(57, '9517', 'Referee have been deleted', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category`) VALUES
(1, 'Duplex'),
(2, 'Micro Apartment'),
(3, 'Loft Apartment'),
(4, 'High-rise'),
(5, 'Mid-rise'),
(6, 'Low-rise'),
(7, 'Garden Apartment'),
(8, 'Studio Apartment'),
(9, 'Alcove Studio'),
(10, 'Convertible Apartment'),
(11, 'Triplex'),
(12, 'Railroad Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city_name`) VALUES
(1, 'Emalahleni'),
(2, 'Nelspruit'),
(3, 'Secunda'),
(4, 'Middelburg'),
(5, 'Benoni'),
(6, 'Pretoria'),
(7, 'Springs'),
(8, 'Johannesburg'),
(9, 'Midrand'),
(10, 'Randburg'),
(11, 'Soweto'),
(12, 'Germiston'),
(13, 'Ermelo'),
(14, 'Durban'),
(15, 'Ladysmith'),
(16, 'Newcastle'),
(17, 'Cape Town'),
(18, 'Stellenbosch'),
(19, 'Bellville'),
(20, 'Worcester'),
(21, 'Kimberley'),
(22, 'Rustenburg'),
(23, 'Klerksdorp'),
(24, 'Port Elizabeth');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `app_id` varchar(255) NOT NULL,
  `landlord` varchar(255) NOT NULL,
  `apartment_type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `rent` int(255) NOT NULL,
  `numrooms` int(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_posted` varchar(255) NOT NULL,
  `enc_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`app_id`, `landlord`, `apartment_type`, `city`, `rent`, `numrooms`, `description`, `date_posted`, `enc_id`) VALUES
('2901920535', 'EM437878260', 'Convertible Apartment', 'Emalahleni', 2500, 2, 'Apartment description here ......', 'April 14, 2022', 17),
('2000752471', 'EM437878260', 'Garden Apartment', 'Benoni', 3000, 3, 'My apartment description ....', 'April 14, 2022', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_requests`
--

CREATE TABLE `tbl_room_requests` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `request_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tokens`
--

CREATE TABLE `tbl_tokens` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tokens`
--

INSERT INTO `tbl_tokens` (`id`, `email`, `token`) VALUES
(2, 'enquiry@it.co.za', '09417387baec065d6d389e5e218022f4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT '-',
  `bdate` varchar(255) NOT NULL DEFAULT '-',
  `bmonth` varchar(255) NOT NULL DEFAULT '-',
  `byear` varchar(255) NOT NULL DEFAULT '-',
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL DEFAULT '-',
  `street` varchar(255) NOT NULL DEFAULT '-',
  `zip` varchar(255) NOT NULL DEFAULT '-',
  `country` varchar(255) NOT NULL DEFAULT '-',
  `phone` varchar(255) NOT NULL DEFAULT '-',
  `avatar` longblob DEFAULT NULL,
  `last_login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `member_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`first_name`, `last_name`, `gender`, `bdate`, `bmonth`, `byear`, `email`, `city`, `street`, `zip`, `country`, `phone`, `avatar`, `last_login`, `role`, `login`, `member_no`) VALUES
('Micheal', 'Mish', 'Male', '29', '04', '1999', 'Sihle.Sihle0429@gmail.com', 'Witbank', '14 Diederich Street', '1035', 'South Africa', '0735678676', 0x89504e470d0a1a0a0000000d49484452000000d8000000e9080300000071d809d70000019b504c5445ffffff1112243d3c662e2e54f3b387f6bb9133211d201710f0f2f1e0e2e126254422223e00000037375bdadadbf3b1850d0e1e3b181629294b290600e08c36d3711800002c1a194aeaa16edd936200001a0000172000002700000e1a3e2828499a63393030511100001a000026264f000013eaeceb2e2d5d41414cc8c8d11e1e4b3837632800002d2c5c3100002c00008c8d946d6e76cbc9c72c1812b0aead250900271918130f0bf4a973eca77ae29b6cf7d9c5fbefe6f5c19df7cfb3fbece29e9dab111034a09796916146864d2db6b5bf191b2a6c6c76292a3887878c5e5f689b9ca1928c8a7166664c3d3a827e7a433230261d165c58568783803c2a276040317c543ca975506c49314f3524706d6abe815a211417885b3dd08b5dbcbab9bb91749e775ed59970d4a37f88644cf6d4bcd988516a6a804444647c7d8f3a3a50626082070540634c4c53517650516367525243211f0805426b4746cdb4a1b9773dce792753404d6f3a1ce0974d422b36ae612ac25f0094532ae489226b4033d58344be661d573834c86c185a290cae70400704344e4f573535414eed526f000010b849444154789ced9c8b5713d716c6131220c1c94420813020144886107c4c624403280f25e481682d820f346d6fad80f555abb6f6aad856e1cfbee731ef73ce4cc09b9909cde7422161b1ce8fbdf7b7f73933a3cfd7524b2db5d4524b2db5d4524b2db5d4524b2db5d4524b2db5d4524b2db5d4524b2db5f46f5798afd5f279deed65fcdf141273f9d5eb6b17c6c6c687862e701cb77623cf87dc5ed5572a9c5bbd7e7368fcc285f3e73bb03a81c638eedb5bab39d1edd51d55b9a5b5f3431714221d18d4c531ae736d35e7f61a0fab10bf747d7cdc0ca507eb9443773ddf3c81e3f3f76e52a10830cc76ab29d872dfad5d186240d1c06056729df7bc9f931de31654743014b79b35b7576ea3d0bdf123800171b7bcdee1f296644c30909179b7976ea3dad091c040d03c9e8e37acaacc0aacb3d3d3f6b874c4548421fbceedc55b483c8a2baa641e9e21972e7c0d9887fd63ed6b2276f196dbcb674a1cb3e4b201ebe4dc5e3f53965e5f079867bbf4aa7589d98279b6955db72e315b30cfbac7ba35971dd8d8aadb002c5964e234d01677118a0d76c36d008642a477009aadade98ef5db1b573737ef6f6e5e7d70e76e071879398e023876cf6d02864423d8f4d6f4dddb0f36ef3f9cb974e952026a002931f0f0fee6d58dbb1d17b98bcd0116d6836dad6f6c3e4cc8448944a15088060b8599999901550f37ef7ccb350318af039bde4cc84c00a85d563408158d424019eeaa8eccb335a6039bbe0ab10a2a921e4c56b480e01e68e9e85957d4476c269188b69b6500436c201f757dacea3601431ad8f49d4b8920c14580058380ecb61a32cf4e1e9a796cdd4f14482e0a5870666053ad32ceabe770a2ba7dde9aa1058c06561878a88185dd2660498dd8faa504858b06161c487cab82b9bd7ea69419787ae3122d13a960330377d422737bfd4c291b68d0c4689948052b0c5c55c06ebabd7ea6946d0bf00e1a17152caaba87878f06948de6d68ff5830555f718f3eef99b7248353d432d313ad8cc800cc62db9bd7ea6f2b22dae53a60e26586140de807a7703edcbc98dec363d13e960d181bb17bddd9fc1e83126bbfd61c0828adf7bb73ffb42e34a1b3b0cd8cc860ce6e123eef3f29e85ee1d0cb084bc7319737bf516c21d7a7a93ee1d0cb082dca1d7dc5ebd856e21b0ad4deadcc104c31d7accabfd7916acfcfb2d3c78d0b91860510cc67d0fde9f759b82d4231425447648b0e07d0e71a1e85d719bc3ac7939fb7ed88213d5e12206c1b81fe42fe6dd2631e9b2b2f89b87060bfe08c03a14cacb6e931835a7dac50fd31dd38705bba8060c24a3b742f6082c3b888edbfe337e24b01f21d3cc4c34187de4368b413013e1e928c0ebe838cf707b0bb0ce02f8171e330683deca45143004d67eb7a3e3b0609d17d7a332180899db2c060535b0db63b7195c2cb0e05dee6e50052bb8cd6250bb9a8aedb77f627131c1823f296033418f45ecb29c8bf01f26171b2c084b2c8a33d15b3586fa7330c1d887d9830571c4005fd46353156ad0c1af028b0ec0f7dbdd263169ce1aa9ae8841b8e89cdb2466d543660b160d7a8e0be88a856dd405168d7a6eb6c79abb62658936605180e5c570c99a7f74f96860ed8fbc35fc929a3d521ff39ac953746cc1e68f06e6f544b4b67d0b300ffb86a22381796ddea0e9ca11c03c36f9d265e11e6c30ef7b876591b1c19aa0c4ac8a8c09d60c256655642c30afce8826b13b190bcc6367894c1d3e15dd5e719d62fa2203cc6367a46c317d9105d6149e08c5b20fc6d596e6b00e2856c818604d133066c8e8f779344fc07c2c63a447ccedb51e4af45e46bdfbad497a9822aae553c09ac6ea55d1ca8c046b8afd8a4994e32a022cda1cd3af51217b306f1efcda8aec6644c49a928b426604f3e005887a6526333eb4d3acf1829a638345db9b980be872900ed68c3e6f94fee29206d65c03225df314b0a6386eb3d55cc10c9668b2f990a139f591460c5698f9b9b97d43d15c2191c00ff14411d6c0c0cfc72362f3d182fc746d013f6f7a7cc0828584ee016fa06303168ceac112c7c43ce60bc83214b099c47101f3cd46e547d6e5c7f313b31e7ed8e3509a0f6232996b3e143a2e64becb51152c2a86424d4ea607b81295c12e87b0c2e1b02836191e3fb9f07839a4487e71b680c01ec9af8a6159cb2bd549cffeef46aac4c9e59ded64a63fd3bf6306838586cb4b091892b8d2b7d8b77862776561d293ffa95d489c5cd87932d17f6622990c0025b74304d9dc65b9bc745ce1f0ee09a4e14cff2f99273b00cf3be9c92fef3c79367166626aaa0d682a80d4cf2b0c5a20f89c0acb2b5cb93e0c36827e1d20d8fddbcf77163c909ba18567130009316161b08c56642ad9d3353260d5450cd6135005f032db0b2e076e0104aacd2879758f7d66b0a5d3634bf24b39b5c42ac3182c6052a67fc1452cfed9993642f2cafa7da69085cf769f1ec209caab99287ec15c5d6630f003b65d4bc849225afa229b54c1f063c04fcf76f70eadf90c010bd7fa884cd452b27fd2252e4ab87445b6a0450c866ce95477776fefd8aa21606169919e89ca2fc70d2e91162e6a91a190ad9e8360e3f7447dc0c4e727acc00219379ef9de6181c9b91811f5210b8bdd00ecd4b95c2ec46b60fc099dd9d3b2f1b1f35c214622aa21d315991816c3a1daa9eedeb1bc58e36b61a2c4185c81c02fcebbfef2840d5846d2868f7018fcf5a2fbd41a08524d978965cb12833f64d971b0c7ac4cd48a2ca4cb453059dd383b740bccbe39cd3ac2cf9966ef5a2e8698585ac8c22183ae9f8511d38b27c70eb3224ee722cf2e31b5c8968d602015d78d6079bb128333a7c3600bec12a315194cc7b5ee53bdbc9e4bdcb12b31d80e1d06b328b1b6b6889c463e03d8cbeed3e346b02e6bb377a5c8ac4a4c09d9af862203b362ef584e0fc65bcc536e1559b8bf0e30639185611fabe9c1aaf699083a99b3c3c7b29577a886bfa3cfc5dc5077ef785e9f892b8c2d8b41fdce76b205ab1253c922fa88d54e03b0257dc476ebc84460418e823db101c364195e07963f07c056458d2bb768dd9ce5b03f7314cc3a13a1a033eab62ea1d012dc8fddd0c0445462d6e14245e624978d772841d34f55a15508765d57629561db70213027dd83b5c734a3e9b62e60a202db96a75ac4f8d12e142ebb9839badbb49c3bd412336c5d422f20d84b0d4cd9b2589ba2c3b387e5dca103d31599ef25dc419f52c144e554c0988e64fc1c9d3d9ed981915b17df5974e6a1d598722ad06307b6ed1c974843895073514bc52108c669c3621f752fd6432939e70ef52df72c32a6b9c8c2084c1b16f38c41b18b089b833b17da4015317d6d2eb21c3e7e538645f3a940520f668ca28343156da032834dc905a29ba8e0f19b322c8abb864ccc7cf34a46033da0c70896746ea8a299a2194cb18fdfb4890a8229c3e26ffa802503af636f64b091ae40579721171db445932942a6080b6cd308b62a836d0e6b014bbedd8bc53e5cc3643d5d3d6630c76c31640a181d0c9325371ea91315005386c52bbf0fabd691d98841c577653020e39e3ae3d45ed36c8a002ac2020bbcfd439da820d80b0cf6e69d1ab0e4e71806fb3389539100fbc5295b349b6204890093ede3cd2ceacf2f10d8a93504f6db7fd580bdddfb2083c55f21f34072c716cd9322034ccec5cf2864bebfba11d83a027bf37e58b68ed107dfc87aff1e551905ccb169d17c39c21aecd50714b2750476ba03052cfe51c9c49e619d941233bbc78e4360e649910586c946633064e24b0c7601ce547b71d5eb7b4ee8c4000b38658be6b9c31a2cb3074316ee4660bda77230609f8659602318cce81efdce7089e6ed33130c9125bf8121e3cf62b0a11a0c182eb11e0a585717a5c87e75660c26b6cf36604f3f8090e5ce61b0f11ab0c4f85fdad431a2130bcca14d3471652c1279c200c3337e2cf687afa680e5c5bd789c7db20d989e93b6e88cdf13e702918014a083e190bd8e7d98cd2b604bb3f1f89fc3ac2301e01dc3d230618b0b8e809947e04824b06c09763516bbb4a4d4d8773fc7e3d78659078ac03b169717093067c660d2ed939349462e22b2b760ae7820476ce85a3c8e4b8cc605337171f20b618b8ef83d792d339211335660a3006cefb49c8a9fe2f1bfd9875300e98bd8471459c0893198376fc6402afa9860902cf31a90fd8e47aa7fe27289518f13617beef30d93eee1c4184c71fb27be7e2bb024dc97ece1a30110305c62d4806130d2161df17bd2ed033b166011b9c862ffc01b5860c0e2ef98573131d80e618b8eccf7c4814704b8311b0ce5620c5719aab0f8dfcc808d76213089b44527c660e256a34872d90e0ced257fef1e42018325c6b81a81c196095b74c4ef894b631150da166011b9c862af4fa380c53f0e33af1e6130fe8bb9c892cf1bcf4571fb8868050643368af6c8ffa080c5d917227a3098484e8b0e5c6217890b2d11d03eadc0e085b23d143214b04fec80c960be5dd2161b3fdf93c7db81c718cc2264f2810d0a18dcb2d0b9f0680fc01e13b6e8c0790e79bc1d90ecc15e69601fd9d79d1530648b06f770c0efc96b7ec014adc100d9ae06f6ce3a132118698b0e9ce750dc7ed21e0c17995c62ac80a96093a42d36be91916e9f14edc0dad0d605838112635d751e51c04412ec49c3c188458311b80eb0a70ad85fec8bce5d0a181e838dfc0d07236e84883cb3078be04e86bb18f366370dec3901d6f0bb3dc83b3c023bf6606d78eb824b8cc5d5a381916370c3eff620eff080a6680f868a0c6d599837ade8c0aa8be6226bf8c685bc791b9a2206b3224bbec560efd8b7758c6860a42d36bc91916d0c4d3b76110321c360ec8029478a108c3c1d687823239f8f407e651bb1b6e46b08f6e730fb0e231d986fd1ec1e0d6f64441b9b7a5227d80604bb36cce4ead18311b6d8f0bbfbb6cd0b9edaa90f6cea2d047bc70e98010cd9a2a12f441acb65befcdcd636b1501f585b602f16ff647147d8881e8cb4c5069fc0f184779c99ac13eccce71828313658971e6c99b0c5069fc0916dec0c5f27d8d4462c7e27c9c2328191a7030d6e64949b8d440dccbac87663f1776cae1e03183e1dd0176483afb8106d6c0abb551d606d137b7f5b64a2118cb4c5063732a28d4d3dae1b6ceaf37b8b4c1c31823d36db62831b1971171536c5fac05e7d6473a925268311a703873e5ae40fa5ed40c4a8e4027c399c19458a586a77b487a911f542745f18fe44fc7888fe3bb60fb7521f77280927cd4aa1d78997a9f25bbca509fdc014fad4f02d875ba9cf7f4cd5026b3659820982e12bf9a33984c14ea6c15fa5227ee940796fb0b29f2aa95f15f7057fa972e06f12613061a5220c4a83a941ff608a938a422a2508292e9fafe6b3550ef89e5fe0b8031e7c48e993363fd02b9253b128a58ae5ac54e6ca52b65c3d90aad974759fdfe7b815b122f193a534cfefe7d27c29ed68c4045ae61bcb037c8b80bf0d7d02bfc4efc86029c9bf92cd0e66b32b1c5716243f97cdeea7d239be9cad96725c255f3be04a222f088ec6ab94ad1c148562313d5812fc69691ffd5b2c038692003f2ba62afbe5fd72a52c15a54ab1ea972a2b525a5a11f46042a552ae8037ca692155f65753832be57d908c025faeeed7b883da642a550af34567bd432883df6bb6bc9faf64b3f9b4749007bf77295d5be1b295956c59aa962bd96236eb2f57ab9cb45fa91e5457c06acbd5941ecc2f54cb45492895aafe62a592ad00fa7da19a9560faf1d95a56aa95d3e0f394a360833b65903852ba9aad48d5d20a242957d3d572494a8328ac4807d54a5102acf0cd72b906beb92a81cf068d60d9a2502a678592944d55b8ac542c1d08fbd5f22088b6205552a9ac54ca72d9b4a36030d9d2fed241d19f164a27c18790062e5d2a1da4f607d342b1e44f97805583d7c06742aa9402af1df8d3984beb6330cb0605f401fea07705e092b0805302fcdc2f78b18b3197f4ef9c3c9a592db066d3ff00339b30a62e53812b0000000049454e44ae426082, '15-04-2022 08:04 PM ', 'Landlord', '25d55ad283aa400af464c76d713c07ad', 'EM437878260');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`enc_id`),
  ADD UNIQUE KEY `job_id` (`app_id`);

--
-- Indexes for table `tbl_room_requests`
--
ALTER TABLE `tbl_room_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`member_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `enc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_room_requests`
--
ALTER TABLE `tbl_room_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
