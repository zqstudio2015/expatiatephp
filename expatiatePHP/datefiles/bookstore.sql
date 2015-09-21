drop table if exists bookCategories;

drop table if exists bookOrders;

drop table if exists bookUsers;

drop table if exists books;

drop table if exists shipingCarts;

/*==============================================================*/
/* Table: bookCategories                                        */
/*==============================================================*/
create table bookCategories
(
   bookCategoryId       int not null auto_increment,
   boo_bookCategoryId   int,
   bookCategoryName     varchar(30) not null,
   bookCategoryDescription text,
   primary key (bookCategoryId)
)
ENGINE = MYISAM;

/*==============================================================*/
/* Index: ind                                                   */
/*==============================================================*/
create index ind on bookCategories
(
   bookCategoryId,
   bookCategoryName
);

/*==============================================================*/
/* Table: bookOrders                                            */
/*==============================================================*/
create table bookOrders
(
   bookOrderId          int not null auto_increment,
   bookId               int not null,
   bookUserId           int not null,
   shipingCartsId       int not null,
   shipingCartsQuantity decimal not null,
   bookOrdersubmissitionTime datetime not null,
   primary key (bookOrderId)
)
ENGINE = MYISAM;

/*==============================================================*/
/* Table: bookUsers                                             */
/*==============================================================*/
create table bookUsers
(
   bookUserId           int not null auto_increment,
   bookUserLoginName    varchar(30) not null,
   bookUserLoginPass    varchar(30) not null,
   bookUserName         varchar(30),
   bookUserPhone        numeric(11,0),
   bookUserShipingAddress varchar(50),
   bookUserZipCode      varchar(10),
   primary key (bookUserId)
)
ENGINE = MYISAM;

/*==============================================================*/
/* Index: ind                                                   */
/*==============================================================*/
create index ind on bookUsers
(
   bookUserId,
   bookUserLoginName,
   bookUserName,
   bookUserPhone,
   bookUserShipingAddress
);

/*==============================================================*/
/* Table: books                                                 */
/*==============================================================*/
create table books
(
   bookId               int not null auto_increment,
   bookCategoryId       int not null,
   bookName             varchar(50) not null,
   bookAuthor           varchar(30) not null,
   bookPrice            decimal not null,
   publishingHouse      varchar(50) not null,
   publicationDate      date not null,
   BookDescription      text,
   primary key (bookId)
)
ENGINE = MYISAM;

/*==============================================================*/
/* Index: ind                                                   */
/*==============================================================*/
create index ind on books
(
   bookId,
   bookName,
   bookPrice,
   BookDescription
);

/*==============================================================*/
/* Index: detail                                                */
/*==============================================================*/
create fulltext index detail on books
(
   
);

/*==============================================================*/
/* Table: shipingCarts                                          */
/*==============================================================*/
create table shipingCarts
(
   shipingCartsId       int not null auto_increment,
   bookUserId           int not null,
   bookId               int not null,
   shipingCartsQuantity decimal not null,
   primary key (shipingCartsId)
)
ENGINE = MYISAM;

/*==============================================================*/
/* Index: ind                                                   */
/*==============================================================*/
create index ind on shipingCarts
(
   bookUserId,
   bookId
);

alter table bookCategories add constraint FK_Relationship_belongsTo foreign key (boo_bookCategoryId)
      references bookCategories (bookCategoryId) on delete restrict on update restrict;

alter table bookOrders add constraint FK_Relationship_CompositionOrder foreign key (bookId)
      references books (bookId) on delete restrict on update restrict;

alter table bookOrders add constraint FK_Relationship_UserOrders foreign key (bookUserId)
      references bookUsers (bookUserId) on delete restrict on update restrict;

alter table books add constraint FK_Relationship_Calibration foreign key (bookCategoryId)
      references bookCategories (bookCategoryId) on delete restrict on update restrict;

alter table shipingCarts add constraint FK_Relationship_Store foreign key (bookId)
      references books (bookId) on delete restrict on update restrict;

alter table shipingCarts add constraint FK_Relationship_UserShipingCart foreign key (bookUserId)
      references bookUsers (bookUserId) on delete restrict on update restrict;
