import React, { useState } from 'react';
import { UtensilsCrossed, Search, ShoppingCart, Phone, Mail, MapPin, Clock, Facebook, Instagram } from 'lucide-react';

interface MenuItem {
  id: string;
  name: string;
  description: string;
  price: number;
  unit: string;
  image: string;
}

interface MenuCategory {
  id: string;
  title: string;
  items: MenuItem[];
}

const menuCategories: MenuCategory[] = [
  {
    id: 'esas-yemekler',
    title: 'Plovlar',
    items: [
      {
        id: 'kuku-goy',
        name: 'Plov Zəfəran',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://assets.epicurious.com/photos/57cedbeaa61773c151cc16b9/master/pass/saffron-rice-pilaf.jpg'
      },
      {
        id: 'kuku-goy2',
        name: 'Plov Şüyüd',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://realfood.tesco.com/media/images/RFO-1400x919-Saffron-pilaf-44280034-02b6-4270-98e7-167b86476bda-0-1400x919.jpg'
      },
      {
        id: 'kuku-goy3',
        name: 'Plov lobbye',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://realhousemoms.com/wp-content/uploads/Black-Bean-Pilaf-FEAT-2.jpg'
      },
      {
        id: 'kuku-goy4',
        name: 'Plov Kişmiş',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://kayzen.az/uploads/images/00/85/62/2016/06/27/a9824b.jpg'
      },
      {
        id: 'kuku-goy5',
        name: 'Plov Noxud',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.ytimg.com/vi/ldKqEaqGeRE/maxresdefault.jpg'
      },
      {
        id: 'kuku-goy6',
        name: 'Plov Vermeşil',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://s3.us-east-2.amazonaws.com/pfimg1/010/82/55/8255aa8f78c98aba89d6ecbf8f93be76_1280m.jpg'
      },
      // ... digər yeməklər
    ]
  },{
    id: 'salatlar',
    title: 'Salatlar',
    items: [
      {
        id: 'saslik7',
        name: 'Lobya salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.ytimg.com/vi/tRMq8gihWmo/maxresdefault.jpg'
      },{
        id: 'saslik7',
        name: 'Badımcan salatı (qoz ilə)',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh1ly_cJnk1kippZ2_rRVPshrrF9rkwDnZXQ&s'
      },{
        id: 'saslik7',
        name: 'Sezar salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://zira.uz/wp-content/uploads/2019/03/salat-cezar-4.jpg'
      },{
        id: 'saslik7',
        name: 'Çoban salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.thespruceeats.com/thmb/Qp0E8YL6sTG626Li4rb0Tu_fjvg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/turkish-shepherds-salad-coban-salatasi-recipe-3274347-hero-01-d3f880b20d274e84b190e6005c221d00.jpg'
      },{
        id: 'saslik7',
        name: 'Nar salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://lh4.googleusercontent.com/proxy/bu7sLZvaEpFsWpfCCPLQXj018qimpBtEooq7fVE30VkTUCJcLjS7ZoLgNsEAiupo7CCic7TflC2Q1XjhZRNIGXQPqSJJQnL9m66mAcXvV58Teoy8aBAbn-8'
      },{
        id: 'saslik7',
        name: 'Pxali',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://ohmyveggies.com/wp-content/uploads/2021/06/Pkhali-Georgian-spinach-dip-scaled.jpg'
      },{
        id: 'saslik7',
        name: 'Düyü salatı (qarğıdalı ilə)',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://evdar.az/wp-content/uploads/Ziyaf%C9%99t-Sufr%C9%99l%C9%99riniz%C9%99-Cox-Yarasacaq-Duyu-Salati.jpg'
      },{
        id: 'saslik7',
        name: 'Kələm salatı (yağda)',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCNAMSZKw8yFFAMEpaWud_1PvatELr2br8Ug&s'
      },{
        id: 'saslik7',
        name: 'Voldorf salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i2.wp.com/www.downshiftology.com/wp-content/uploads/2022/11/Waldorf-Salad-main.jpg'
      },{
        id: 'saslik7',
        name: 'Paytaxt salatı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://img.freepik.com/free-photo/side-view-olivier-salad-with-mimosa-salad-tomato-cucumber-round-white-plate_176474-3004.jpg?t=st=1739172829~exp=1739176429~hmac=3b1d7843df0ab7571aa38e6f9e160e78f5ea60e417c7d86db2cc8e3dcfb7963e&w=1480'
      },
      // ... digər yeməklər
    ]
  },
  {
    id: 'kebablar',
    title: 'Kartof Yeməkləri',
    items: [
      {
        id: 'saslik2',
        name: 'Kartof Külləmə',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://vuvito.az/image/catalog/Restoranlar/cenlibel-restorani/kartof-kllm.jpg'
      },
      {
        id: 'saslik3',
        name: 'Kartof Püre',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://lent.az/storage/news/2023/november/03/big/6544a7346ce5b6544a7346ce5c16989980686544a7346ce586544a7346ce5a.webp'
      },
      {
        id: 'saslik3',
        name: 'Kartof Qızartma',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://evdar.az/wp-content/uploads/Fast-Food-Restoranlar%C4%B1ndaki-Kartoflar%C4%B1-Unutduracaq-Kartof-Q%C4%B1zartmas%C4%B1-1170x650.jpg'
      },
      // ... digər yeməklər
    ]
  },{
    id: 'sandvich',
    title: 'Sandviçlər və Burgerlər',
    items: [
      {
        id: 'saslik2',
        name: 'Klab sandviç',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.foodandwine.com/thmb/tM060YA0Fd0UALCmPQ-5gGWyBqA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Classic-Club-Sandwich-FT-RECIPE0523-99327c9c87214026b9419b949ee13a9c.jpg'
      },
      {
        id: 'saslik3',
        name: 'Burger toyuq ilə',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.recipetineats.com/tachyon/2017/07/Chicken-Burgers-4.jpg'
      },
      {
        id: 'saslik3',
        name: 'Burger etli',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://images.immediate.co.uk/production/volatile/sites/30/2022/06/Barbecue-beef-burger-68d57ec.jpg'
      },
      // ... digər yeməklər
    ]
  },
  {
    id: 'toyuq',
    title: 'Toyuq Yeməkləri',
    items: [
      {
        id: 'saslik1',
        name: 'Toyuq kotleti',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.ytimg.com/vi/tmHB5YsxnB4/maxresdefault.jpg'
      },{
        id: 'saslik1',
        name: 'Döymə toyuq kotleti',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.ytimg.com/vi/Eqt-V-y6d8c/maxresdefault.jpg'
      },{
        id: 'saslik1',
        name: 'Faxitos toyuq',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfnmJ14ZHwudPgYOBJg2V-3TY0oGsnZPjVmg&s'
      },{
        id: 'saslik1',
        name: 'Soyutma toyuq',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://vuvito.az/image/catalog/Restoranlar/maqnoliya/toyuq-soyutma.jpg'
      },{
        id: 'saslik1',
        name: 'Toyuq Nagetsi',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.cookwithnabeela.com/wp-content/uploads/2024/02/ChickenNuggets-500x500.webp'
      },{
        id: 'saslik1',
        name: 'Toyuq nagetsi xırda',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.justataste.com/wp-content/uploads/2022/01/crispy-air-fryer-chicken-nuggets.jpg'
      },{
        id: 'saslik1',
        name: 'Toyuq levenqi',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReO0KCOiyx5sE_zREYMq8XxqX1GhVhV9psDAHgNjcpq28Yj_kQhGug9BnZ9TVVHjaAXWw&usqp=CAU'
      },{
        id: 'saslik1',
        name: 'Tabaka',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://sunelivalley.com/cdn/shop/articles/20240403145433-tabaka-for-card.jpg?v=1712953633'
      },{
        id: 'saslik1',
        name: 'Bujuanina toyuq',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.sprinklesandsprouts.com/wp-content/uploads/2023/04/Chicken-Bhuna-SQ.jpg'
      },{
        id: 'saslik1',
        name: 'Toyuq ruleti levenqi',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.ytimg.com/vi/fjOx8XE_FwI/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAv9EIQAtIZM9qO6CgC-5KfUWbtYA'
      },{
        id: 'saslik1',
        name: 'Toyuq ruleti gavalı',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://joyandmeal.com/wp-content/uploads/2022/11/47.png'
      },{
        id: 'saslik1',
        name: 'Toyuq stroqanoff',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://images.immediate.co.uk/production/volatile/sites/2/2023/08/Chicken-stroganoff-1923c5f.jpg'
      },
      // ... digər yeməklər
    ]
  },
  {
    id: 'et-yemekler',
    title: 'Ət Yeməkləri',
    items: [
      {
        id: 'saslik12',
        name: 'Qiymə dana qulyaj',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://imageproxy.wolt.com/menu/menu-images/659aaf34b33a40c2683d80e6/201aa7a4-b448-11ee-859a-e6137adc4cf0_qulaj_et.jpg'
      },{
        id: 'saslik12',
        name: 'Ət kotleti',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://evdar.az/wp-content/uploads/%C6%8Fn-Dadli-Kotlet-Reseptl%C9%99ri1.jpg'
      },{
        id: 'saslik12',
        name: 'Faxitos ətli',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_mIYAjGlVMkQOxsi1-kNbfbQyEQ0aRUdFLw&s'
      },{
        id: 'saslik12',
        name: 'Langet sade',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://folt.az/wp-content/uploads/2023/07/502-1416659557_stejk-iz-mramornoj-govyadiny-striplojn.jpg'
      },{
        id: 'saslik12',
        name: 'Langet suxari',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://st5.depositphotos.com/73958464/63128/i/450/depositphotos_631286844-stock-photo-languette-langet-chop-cutlet-meat.jpg'
      },
      // ... digər yeməklər
    ]
  },
  {
    id: 'qelyanalti',
    title: 'Qəlyanaltılar',
    items: [
      {
        id: 'saslik6',
        name: 'Bulgur',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://foolproofliving.com/wp-content/uploads/2021/03/How-to-cook-bulgur-wheat-600x600.jpg'
      },{
        id: 'saslik6',
        name: 'Qarabaşaq',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://marneulifm.ge/pictures/9/db774ce8ddce07afd296eeaf4e0a7604.jpg'
      },{
        id: 'saslik6',
        name: 'Mini rulet ləvəngi',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://img.postershop.me/4661/dc3d4a91-d123-4e30-8d21-2fffc53db69a_image.jpeg'
      },{
        id: 'saslik6',
        name: 'Spagetti',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfeuOgA6nOEyNdQCjTAdZUZ-pWSlaQa2cAZQ&s'
      },{
        id: 'saslik6',
        name: 'Çöp şiş',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://i.nefisyemektarifleri.com/2018/04/12/pratik-tavuk-cop-sis-videolu-3.jpg'
      },{
        id: 'saslik6',
        name: 'Kələm dolması',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://img.freepik.com/free-photo/kelem-dolmasi-cabbage-leaves-stuffed-with-meat-rice-with-beef-stew-with-vegetables-lavash_114579-759.jpg?t=st=1739141450~exp=1739145050~hmac=f6a57cb4c19b5a206a7f4b7d544066f7d76f6bec96cbc2db17d2295c133713b0&w=1060'
      },{
        id: 'saslik6',
        name: 'Yarpaq dolması',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://img.freepik.com/free-photo/dolma-tolma-sarma-stuffed-grape-leaves-with-rice-meat-kitchen-table-with-yogurt-bread-vegetables-traditional-caucasian-ottoman-turkish-greek-cuisine_114579-55.jpg?t=st=1739141515~exp=1739145115~hmac=869c3b32260791a2c4a54f3ceb48f46a903feb99b509bff20ee00aa57363ea3f&w=1060'
      },{
        id: 'saslik6',
        name: 'Blinçik Ət',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://www.azcookbook.com/wp-content/uploads/2009/01/crepes-stuffed-with-meat1.jpg'
      },{
        id: 'saslik6',
        name: 'Blinçik kəsmik',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://homefood.az/wp-content/uploads/2024/10/blincik.jpg'
      },{
        id: 'saslik6',
        name: 'Blinçik boş',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0vVjayLoeRqxA3W_HX_graAQ42IEzYoclOg&s'
      },{
        id: 'saslik6',
        name: 'Blinçik Nutella',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuZQYlSFd379N4qTF9EjIN03yeCwKjipv-PA&s'
      },
      // ... digər yeməklər
    ]
  },
  {
    id: 'desertler',
    title: 'Dessertlər',
    items: [
      {
        id: 'saslik7',
        name: 'Sinnabon',
        description: 'Təzə göyərti, yumurta və ədviyyatlarla hazırlanmış ləzzətli yemək',
        price: 1.5,
        unit: '100qr',
        image: 'https://cinnabon.uk/cdn/shop/products/ClassicCinnabon2000x2000pxs_1445x.jpg?v=1675674021'
      },
      // ... digər yeməklər
    ]
  },

  // ... digər kateqoriyalar
];

function App() {
  const [openCategory, setOpenCategory] = useState<string | null>('esas-yemekler');
  const [searchTerm, setSearchTerm] = useState('');
  const [cart, setCart] = useState<string[]>([]);

  const toggleCategory = (id: string) => {
    setOpenCategory(openCategory === id ? null : id);
  };

  const addToCart = (itemId: string) => {
    setCart([...cart, itemId]);
  };

  const filteredCategories = menuCategories.map(category => ({
    ...category,
    items: category.items.filter(item =>
      item.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      item.description.toLowerCase().includes(searchTerm.toLowerCase())
    )
  })).filter(category => category.items.length > 0);

  return (
    <div className="min-h-screen flex flex-col bg-[#FBF7F4]">
      {/* Header */}
      <div className="bg-[#823600] text-white">
        {/* Top Bar */}
        <div className="bg-[#6b2c00] py-2">
          <div className="container mx-auto px-4">
            <div className="flex justify-between items-center text-sm">
              <div className="flex items-center gap-4">
                <span className="flex items-center gap-1">
                  <Phone className="h-4 w-4" />
                  <a href="https://wa.me/+994503891101">+994 50 389 11 01</a>
                </span>
                <span className="flex items-center gap-1">
                  <Mail className="h-4 w-4" />
                  <a href="mailto:info@garagekulinariya.az">info@garagekulinariya.az</a>
                </span>
              </div>
              <div className="flex items-center gap-4">
                <a href="#" className="hover:text-yellow-400 transition-colors">
                  <Facebook className="h-4 w-4" />
                </a>
                <a href="https://www.instagram.com/garage_kulinariya/" className="hover:text-yellow-400 transition-colors">
                  <Instagram className="h-4 w-4" />
                </a>
              </div>
            </div>
          </div>
        </div>

        {/* Main Header */}
        <header className="py-4 shadow-lg sticky top-0 z-50">
          <div className="container mx-auto px-4">
            <div className="flex items-center justify-between">
              <div className="flex items-center gap-3">
                <UtensilsCrossed className="h-10 w-10" />
                <div>
                  <h1 className="text-2xl font-bold">Garage Kulinariya</h1>
                  <p className="text-sm text-white/80">Ləzzətin yeni ünvanı</p>
                </div>
              </div>
              <div className="flex items-center gap-6">
                <div className="relative">
                  <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-5 w-5" />
                  <input
                    type="text"
                    placeholder="Axtar..."
                    className="pl-10 pr-4 py-2 rounded-full bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-white/20 w-64"
                    value={searchTerm}
                    onChange={(e) => setSearchTerm(e.target.value)}
                  />
                </div>
                <div className="relative">
                  <ShoppingCart className="h-6 w-6 hover:text-yellow-400 transition-colors cursor-pointer" />
                  {cart.length > 0 && (
                    <span className="absolute -top-2 -right-2 bg-yellow-400 text-[#823600] rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                      {cart.length}
                    </span>
                  )}
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>

      {/* Navigation */}
      <nav className="bg-white shadow-md sticky top-24 z-40">
        <div className="container mx-auto px-4 py-2 overflow-x-auto">
          <div className="flex space-x-2 whitespace-nowrap">
            {filteredCategories.map((category) => (
              <button
                key={category.id}
                onClick={() => toggleCategory(category.id)}
                className={`px-4 py-2 rounded-full transition-colors ${
                  openCategory === category.id
                    ? 'bg-[#823600] text-white'
                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                }`}
              >
                {category.title}
              </button>
            ))}
          </div>
        </div>
      </nav>

      {/* Main Content */}
      <main className="container mx-auto px-4 py-8 flex-grow">
        {filteredCategories.map((category) => (
          <div
            key={category.id}
            className={`space-y-6 ${openCategory === category.id ? '' : 'hidden'}`}
          >
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
              {category.items.map((item) => (
                <div
                  key={item.id}
                  className="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow"
                >
                  <div className="md:flex">
                    <div className="md:flex-shrink-0">
                      <img
                        className="h-48 w-full md:w-48 object-cover"
                        src={item.image}
                        alt={item.name}
                      />
                    </div>
                    <div className="p-6 flex flex-col justify-between flex-grow">
                      <div>
                        <h3 className="text-xl font-semibold text-gray-900 mb-2">
                          {item.name}
                        </h3>
                        <p className="text-gray-600 text-sm mb-4">
                          {item.description}
                        </p>
                      </div>
                      <div className="flex items-center justify-between">
                        <span className="text-2xl font-bold text-[#823600]">
                          {item.price.toFixed(2)}₼/{item.unit}
                        </span>
                        <button
                          onClick={() => addToCart(item.id)}
                          className="px-4 py-2 bg-[#823600] text-white rounded-lg hover:bg-[#6b2c00] transition-colors"
                        >
                          Səbətə at
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        ))}
      </main>

      {/* Footer */}
      <footer className="bg-[#823600] text-white mt-auto">
        <div className="container mx-auto px-4 py-12">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {/* Əlaqə */}
            <div>
              <h3 className="text-xl font-semibold mb-4">Əlaqə</h3>
              <ul className="space-y-3">
                <li className="flex items-center gap-2">
                  <Phone className="h-5 w-5" />
                  <a href="https://wa.me/+994503891101">+994 50 389 11 01</a>
                </li>
                <li className="flex items-center gap-2">
                  <Mail className="h-5 w-5" />
                  <a href="mailto:info@garagekulinariya.az">info@garagekulinariya.az</a>
                </li>
                <li className="flex items-center gap-2">
                  <MapPin className="h-5 w-5" />
                  <address className="not-italic">
                    Bakı şəh., Nərimanov ray., Ağa Nemətulla küç. 12
                  </address>
                </li>
              </ul>
            </div>

            {/* İş saatları */}
            <div>
              <h3 className="text-xl font-semibold mb-4">İş saatları</h3>
              <ul className="space-y-3">
                <li className="flex items-center gap-2">
                  <Clock className="h-5 w-5" />
                  <span>Bazar ertəsi - Cümə: 09:00 - 22:00</span>
                </li>
                <li className="flex items-center gap-2">
                  <Clock className="h-5 w-5" />
                  <span>Şənbə - Bazar: 10:00 - 23:00</span>
                </li>
              </ul>
            </div>

            {/* Sosial şəbəkələr */}
            <div>
              <h3 className="text-xl font-semibold mb-4">Bizi izləyin</h3>
              <div className="flex gap-4">
                <a href="#" className="hover:text-yellow-400 transition-colors">
                  <Facebook className="h-6 w-6" />
                </a>
                <a href="https://www.instagram.com/garage_kulinariya/" className="hover:text-yellow-400 transition-colors">
                  <Instagram className="h-6 w-6" />
                </a>
              </div>
            </div>
          </div>

          <div className="border-t border-white/20 mt-8 pt-8 text-center text-sm">
            <p>© {new Date().getFullYear()} AVIAASAN. Bütün hüquqlar qorunur.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default App;