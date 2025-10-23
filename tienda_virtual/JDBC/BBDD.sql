create table virtual_store;
use virtual_store;

create table user(

);

create table category(
    id_c int auto_increment,
    name_c varchar(20) not null
    img_c_t text default "",
    img_c_b blob, --esto es para almacenar la imgen en binarios
    primary key(id_c)
);

create table product(
    id_p int auto_increment,
    name_p varchar(20) not null,
    id_c int not null,
    img_p_t text default "",
    img_p_b blob,
    primary key(id_c),
    constraint fk_category_product
        foreign key (id_c) references category(id_c)
);


insert into category (name_c,img_c_t) values 
('TVs','https://images.vexels.com/media/users/3/127688/isolated/preview/0c9e6c4b22c3f4007be4db65153328e5-tv-lcd-plana.png'),
('Smartphones','https://images.vexels.com/media/users/3/208476/isolated/preview/4c2a67b8c8fbf754b795febf869c55a2-smartphone-device-illustration.png'),
('PCs','https://uxwing.com/wp-content/themes/uxwing/download/computers-mobile-hardware/computer-desktop-color-icon.png'),
('Laptops','https://freesvg.org/img/laptop-2.png'),
('Consoles','https://cdn-icons-png.freepik.com/256/13007/13007831.png?semt=ais_white_label');

insert into product (name_p,id_c,img_p_t) values
-- TVs (1)
('Samsung QLED 4K', 1, 'https://img.freepik.com/free-photo/modern-tv-screen-realistic-living-room_23-2149712019.jpg'),
('LG OLED C3', 1, 'https://img.freepik.com/free-photo/modern-tv-living-room-design_23-2149872390.jpg'),
('Sony Bravia XR', 1, 'https://img.freepik.com/free-photo/modern-flat-screen-tv-entertainment_23-2149680129.jpg'),
('Hisense ULED 55P', 1, 'https://img.freepik.com/free-photo/tv-screen-background_23-2149392100.jpg'),
('TCL 4K Roku', 1, 'https://img.freepik.com/free-photo/blank-tv-screen-home_23-2148895429.jpg'),
('Philips Ambilight OLED', 1, 'https://img.freepik.com/free-photo/oled-tv-home-interior_23-2148909331.jpg'),
('Panasonic Smart TV', 1, 'https://img.freepik.com/free-photo/lcd-television-screen-room_23-2149065173.jpg'),
('Sharp Aquos 55"', 1, 'https://img.freepik.com/free-photo/smart-tv-with-apps_23-2149274511.jpg'),
('Samsung The Frame', 1, 'https://img.freepik.com/free-photo/tv-modern-decor_23-2149006023.jpg'),
('LG NanoCell 4K', 1, 'https://img.freepik.com/free-photo/television-set-room_23-2149914142.jpg'),

-- Smartphones (2)
('iPhone 15 Pro', 2, 'https://img.freepik.com/free-photo/new-smartphone-model-front-view_23-2149385991.jpg'),
('Samsung Galaxy S23', 2, 'https://img.freepik.com/free-photo/modern-smartphone-mockup_23-2149375267.jpg'),
('Google Pixel 8', 2, 'https://img.freepik.com/free-photo/modern-smartphone-touchscreen_23-2149375165.jpg'),
('Xiaomi 13 Ultra', 2, 'https://img.freepik.com/free-photo/smartphone-green-wall_23-2149556210.jpg'),
('OnePlus 11', 2, 'https://img.freepik.com/free-photo/modern-phone-white-table_23-2149507121.jpg'),
('Motorola Edge 40', 2, 'https://img.freepik.com/free-photo/modern-cellphone_23-2149375223.jpg'),
('Sony Xperia 1 V', 2, 'https://img.freepik.com/free-photo/modern-mobile-device_23-2149375331.jpg'),
('Huawei P60 Pro', 2, 'https://img.freepik.com/free-photo/modern-phone-mockup_23-2149375200.jpg'),
('Nothing Phone 2', 2, 'https://img.freepik.com/free-photo/new-modern-phone_23-2149375260.jpg'),
('Asus Zenfone 10', 2, 'https://img.freepik.com/free-photo/black-smartphone-isolated_23-2149375233.jpg'),

-- PCs (3)
('Dell Optiplex 7000', 3, 'https://img.freepik.com/free-photo/computer-desktop-office_23-2148880423.jpg'),
('HP Envy Tower', 3, 'https://img.freepik.com/free-photo/office-desktop-setup_23-2148880551.jpg'),
('iMac 24"', 3, 'https://img.freepik.com/free-photo/apple-imac-computer_23-2148880573.jpg'),
('Acer Aspire TC', 3, 'https://img.freepik.com/free-photo/pc-desktop-modern-workplace_23-2148880634.jpg'),
('Lenovo ThinkCentre', 3, 'https://img.freepik.com/free-photo/modern-desktop-pc_23-2148880722.jpg'),
('CyberPower Gaming PC', 3, 'https://img.freepik.com/free-photo/colorful-gaming-setup_23-2148919112.jpg'),
('MSI Creator P100', 3, 'https://img.freepik.com/free-photo/modern-desktop-set_23-2148880698.jpg'),
('NZXT H710 Build', 3, 'https://img.freepik.com/free-photo/custom-gaming-computer_23-2149051004.jpg'),
('Corsair One Compact', 3, 'https://img.freepik.com/free-photo/sleek-pc-build_23-2149065100.jpg'),
('HP Omen 45L', 3, 'https://img.freepik.com/free-photo/high-performance-gaming-pc_23-2149051002.jpg'),

-- Laptops (4)
('MacBook Air M2', 4, 'https://img.freepik.com/free-photo/open-laptop-desk_23-2148880344.jpg'),
('ASUS Vivobook 15', 4, 'https://img.freepik.com/free-photo/laptop-gray-table_23-2148880364.jpg'),
('Dell XPS 13', 4, 'https://img.freepik.com/free-photo/modern-laptop-desk_23-2148880419.jpg'),
('HP Pavilion 15', 4, 'https://img.freepik.com/free-photo/laptop-bedroom_23-2148880312.jpg'),
('Lenovo Yoga 9i', 4, 'https://img.freepik.com/free-photo/flexible-laptop-table_23-2148880394.jpg'),
('Razer Blade 16', 4, 'https://img.freepik.com/free-photo/gaming-laptop-keyboard_23-2149051001.jpg'),
('Acer Swift X', 4, 'https://img.freepik.com/free-photo/laptop-work-desk_23-2148880356.jpg'),
('MSI GS66 Stealth', 4, 'https://img.freepik.com/free-photo/black-laptop-modern_23-2148880400.jpg'),
('Gigabyte Aero 16', 4, 'https://img.freepik.com/free-photo/laptop-modern-table_23-2148880380.jpg'),
('Samsung Galaxy Book3', 4, 'https://img.freepik.com/free-photo/modern-laptop-living-room_23-2148880372.jpg'),

-- Consoles (5)
('PlayStation 5', 5, 'https://img.freepik.com/free-photo/sony-playstation-console_23-2149116050.jpg'),
('Xbox Series X', 5, 'https://img.freepik.com/free-photo/xbox-console_23-2149074120.jpg'),
('Nintendo Switch OLED', 5, 'https://img.freepik.com/free-photo/nintendo-switch-console_23-2149116022.jpg'),
('Steam Deck', 5, 'https://img.freepik.com/free-photo/portable-game-console_23-2149116071.jpg'),
('PlayStation 4 Slim', 5, 'https://img.freepik.com/free-photo/ps4-console_23-2149116063.jpg'),
('Xbox Series S', 5, 'https://img.freepik.com/free-photo/xbox-series-s-console_23-2149074143.jpg'),
('Nintendo Switch Lite', 5, 'https://img.freepik.com/free-photo/switch-lite-console_23-2149116012.jpg'),
('Retro NES Classic', 5, 'https://img.freepik.com/free-photo/retro-gaming-console_23-2149116082.jpg'),
('PS Vita', 5, 'https://img.freepik.com/free-photo/ps-vita-handheld_23-2149116090.jpg'),
('Game Boy Advance SP', 5, 'https://img.freepik.com/free-photo/gameboy-advance-sp_23-2149116035.jpg');

