create database OnlineMusicHub;
use OnlineMusicHub;
--select DB_NAME()

create table Account (
	AccountID int primary key,
	Username nvarchar(15) unique,
	HashedPassword nvarchar(max),
	AvatarLink varchar(max),
	isAdmin bit
);


create table Song(
	SongID int primary key,
	SongTitle nvarchar(30),
	SongViews int,
	AudioLink nvarchar(max),
	SongImageLink nvarchar(max)
);

create table MV(
	MVID int primary key,
	MVTitle nvarchar(100),
	MVImage nvarchar(max),
	MVLink nvarchar(max),
	MVView int
);

--MySong is a song belongs to an account
create table MySong(
	MySongID int primary key identity(1,1),
	SongID int,
	AccountID int,

	foreign key (SongID) references Song(SongID) 
	on delete cascade on update cascade,
	foreign key (AccountID) references Account(AccountID) 
	on delete cascade on update cascade,
);

--MyMV is a MV belongs to an account
create table MyMV(
	MyMVID int primary key identity(1,1),
	MVID int,
	AccountID int,

	foreign key (MVID) references MV(MVID) 
	on delete cascade on update cascade,
	foreign key (AccountID) references Account(AccountID) 
	on delete cascade on update cascade,
);


create table Singer(
	SingerID int primary key identity(1,1),
	SingerName nvarchar(30),
	Background nvarchar(max),
	SingerImage nvarchar(250)
);

create table SongPerformedBy(
	songPerformance int primary key identity(1,1),
	SingerID int,
	SongID int,

	foreign key (SingerID) references Singer(SingerID) 
	on delete cascade on update cascade,
	foreign key (SongID) references Song(SongID) 
	on delete cascade on update cascade
);

create table MVPerformedBy(
	mvPerformance int primary key identity(1,1),
	SingerID int,
	MVID int,

	foreign key (SingerID) references Singer(SingerID) 
	on delete cascade on update cascade,
	foreign key (MVID) references MV(MVID) 
	on delete cascade on update cascade
);



--#################################################################################

go
create procedure AddUser
	@pAccountID int = 0,
	@pUsername nvarchar(15) = NULL,
	@pHashedPassword nvarchar(max) = NULL,
	@pAvatarLink varchar(max) = NULL,
	@pIsAdmin bit,
	@responseMessage nvarchar(250) output
as
begin
	set nocount on

	begin try
		insert into Account (AccountID, Username, HashedPassword, AvatarLink, isAdmin)
		values (@pAccountID, @pUsername, @pHashedPassword, @pAvatarLink, @pIsAdmin);
		
		set @responseMessage = 'Successfully inserted into table Account.';
	end try

	begin catch
		set @responseMessage = error_message();
	end catch
end


--#################################################################################
GO
INSERT [dbo].[Account] ([AccountID], [Username], [HashedPassword], [AvatarLink], [isAdmin]) VALUES (1, N'admin', N'b007baa74d6f4abedc7aef1351f59c2df7ab59252a6707952313c7f9eb5524f9', N'./images/default-avatar.png', 1)
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (1, N'2002', 0, N'2002.mp3', N'2002.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (2, N'All Falls Down', 0, N'allfallsdown.mp3', N'allfallsdown.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (3, N'Alone', 0, N'alone.mp3', N'alone.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (4, N'Tired', 0, N'tired.mp3', N'tired.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (5, N'The Spectre', 0, N'thespectre.mp3', N'thespectre.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (6, N'Darkside', 0, N'darkside.mp3', N'darkside.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (7, N'Sing Me To Sleep', 0, N'singmetosleep.mp3', N'singmetosleep.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (9, N'Ignite', 0, N'ignite.mp3', N'ignite.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (10, N'Hymn For The Weekend', 0, N'hymnfortheweekend.mp3', N'hymnfortheweekend.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (11, N'Price Tag', 0, N'pricetag.mp3', N'pricetag.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (12, N'Faded', 0, N'faded.mp3', N'faded.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (13, N'Friends', 0, N'friends.mp3', N'friends.jpg')
GO
INSERT [dbo].[Song] ([SongID], [SongTitle], [SongViews], [AudioLink], [SongImageLink]) VALUES (14, N'Flashlight', 0, N'flashlight.mp3', N'flashlight.jpg')
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (1, N'Price Tag', N'pricetag.jpg', N'https://www.youtube.com/embed/qMxX-QOV9tI', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (2, N'Flashlight', N'flashlight.jpg', N'https://www.youtube.com/embed/DzwkcbTQ7ZE', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (3, N'Domino', N'domino.jpg', N'https://www.youtube.com/embed/UJtB55MaoD0', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (4, N'2002', N'2002.jpg', N'https://www.youtube.com/embed/Il-an3K9pjg', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (5, N'F.R.I.E.N.D.S', N'friends.jpg', N'https://www.youtube.com/embed/jzD_yyEcp0M', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (6, N'Our Song', N'oursong.jpg', N'https://www.youtube.com/embed/2Z8L4Qed8F8', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (7, N'Way Too Long', N'waytoolong.jpg', N'https://www.youtube.com/embed/jweXZ7tlfMU', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (8, N'Don''t Play', N'dontplay.jpg', N'https://www.youtube.com/embed/Sv0izR1aTt4', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (9, N'Problem', N'problem.jpg', N'https://www.youtube.com/embed/GsSkg6Yxz5M', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (10, N'All Falls Down', N'allfallsdown.jpg', N'https://www.youtube.com/embed/6RLLOEzdxsM', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (11, N'Faded', N'faded.jpg', N'https://www.youtube.com/embed/60ItHLz5WEA', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (12, N'Alone', N'alonew.jpg', N'https://www.youtube.com/embed/1-xGerv5FOk', 1)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (13, N'Sing Me To Sleep', N'singmetosleep.jpg', N'https://www.youtube.com/embed/2i2khp_npdE', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (14, N'The Spectre', N'thespectre.jpg', N'https://www.youtube.com/embed/wJnBTPUQS5A', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (15, N'Darkside', N'darkside.jpg', N'https://www.youtube.com/embed/M-P4QBt-FWw', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (16, N'Tired', N'tired.jpg', N'https://www.youtube.com/embed/g4hGRvs6HHU', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (17, N'Ignite', N'ignite.jpg', N'https://www.youtube.com/embed/Az-mGR-CehY', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (18, N'Hymn For The Weekend', N'hymnfortheweekend.jpg', N'https://www.youtube.com/embed/mOivOlP9GRk', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (19, N'Bad Romance', N'badromance.png', N'https://www.youtube.com/embed/qrO4YZeyl0I', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (20, N'Poker Face', N'pokerface.jpg', N'https://www.youtube.com/embed/bESGLojNYSo', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (21, N'Applause', N'applause.jpg', N'https://www.youtube.com/embed/pco91kroVgQ', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (22, N'Born This Way', N'bornthisway.jpg', N'https://www.youtube.com/embed/wV1FrqwZyKw', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (23, N'Sorry', N'sorry.png', N'https://www.youtube.com/embed/8ELbX5CMomE', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (24, N'Love Yourself', N'loveyourself.jpg', N'https://www.youtube.com/embed/oyEuk8j8imI', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (25, N'What Do You Mean', N'whatdoyoumean.jpg', N'https://www.youtube.com/embed/DK_0jXPuIr0', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (26, N'Maps', N'maps.jpg', N'https://www.youtube.com/embed/Y7ix6RITXM0', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (27, N'One More Night', N'onemorenight.jpg', N'https://www.youtube.com/embed/fwK7ggA3-bU', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (28, N'Move Like Jagger', N'movelikejagger.jpg', N'https://www.youtube.com/embed/iEPTlhBmwRg', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (29, N'Payphone', N'payphone.png', N'https://www.youtube.com/embed/KRaWnd3LJfs', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (30, N'This Love', N'thislove.jpg', N'https://www.youtube.com/embed/XPpTgCho5ZA', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (31, N'Misery', N'misery.jpg', N'https://www.youtube.com/embed/6g6g2mvItp4', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (32, N'Memories', N'memories.jpeg', N'https://www.youtube.com/embed/SlPhMPnQ58k', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (33, N'Sugar', N'sugar.jpg', N'https://www.youtube.com/embed/09R8_2nJtjg', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (34, N'Girls Like You', N'girlslikeyou.jpg', N'https://www.youtube.com/embed/aJOTlE1K90k', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (35, N'There''s Nothing Holding Me Back', N'therenothingholdingmeback.jpg', N'https://www.youtube.com/embed/dT2owtxkU8k', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (36, N'Señorita', N'senorita.jpg', N'https://www.youtube.com/embed/Pkh8UtuejGw', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (37, N'Treat You Better', N'treatyoubetter.jpg', N'https://www.youtube.com/embed/lY2yjAdbvdQ', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (38, N'Hello', N'hello.jpg', N'https://www.youtube.com/embed/YQHsXMglC9A', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (39, N'Rolling In The Deep', N'rollinginthedeep.jpg', N'https://www.youtube.com/embed/rYEDA3JcQqw', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (40, N'Someone Like You', N'someonelikeyou.jpg', N'https://www.youtube.com/embed/hLQl3WQQoQ0', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (41, N'Scared To Be Lonely', N'scaredtobelonely.jpg', N'https://www.youtube.com/embed/-O0pFU3r3q4', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (42, N'So Far Away', N'sofaraway.jpg', N'https://www.youtube.com/embed/o7iL2KzDh38', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (43, N'In The Name Of Love', N'inthenameoflove.jpg', N'https://www.youtube.com/embed/RnBT9uUYb1w', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (44, N'Cheap Thrill', N'cheapthrill.jpg', N'https://www.youtube.com/embed/nYh-n7EOtMA', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (45, N'Chandelier', N'chandelier.jpg', N'https://www.youtube.com/embed/2vjPBrBU-TM', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (46, N'Titanium', N'titanium.jpg', N'https://www.youtube.com/embed/JRfuAukYTKg', 0)
GO
INSERT [dbo].[MV] ([MVID], [MVTitle], [MVImage], [MVLink], [MVView]) VALUES (47, N'Dusk Till Dawn', N'dusktilldawn.jpg', N'https://www.youtube.com/embed/tt2k8PGm-TI', 0)
GO
SET IDENTITY_INSERT [dbo].[Singer] ON 

GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (1, N'Jessie J', N'Jessie J, tên khai sinh là Jessica Ellen Cornish (sinh ngày 27 tháng 3 năm 1988), là nghệ sĩ–nhạc sĩ người Anh. Cô ký hợp đồng thu âm với hãng Island Records và thu âm album phòng thu đầu tay của mình Who You Are (2011).', N'jessiej.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (2, N'Anne Marie', N'Anne-Marie Rose Nicholson, được biết đến với nghệ danh Anne-Marie, là một ca sĩ và nhạc sĩ người Anh, có năm đĩa đơn nằm trong UK Singles Chart, với "Rockabye" của Clean Bandit, kết hợp với Sean Paul.', N'annemarie.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (3, N'Alan Walker', N'Alan Olav Walker, thường được biết đến với nghệ danh Alan Walker là một nam DJ và nhà sản xuất thu âm người Na Uy gốc Anh.', N'alanwalker.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (4, N'Lady Gaga', N'Stefani Joanne Angelina Germanotta hay được biết đến với nghệ danh Lady Gaga, là một nữ ca sĩ kiêm nhạc sĩ người Mỹ. Ngoài ra, cô còn là doanh nhân, nhà thiết kế thời trang, diễn viên, nhà hoạt động xã hội.', N'ladygaga.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (5, N'Justin Bieber', N'Justin Drew Bieber là một nam ca sĩ kiêm sáng tác nhạc người Canada. Được phát hiện tài năng ở tuổi 13 bởi Scooter Braun sau khi anh xem các video cover bài hát của Bieber trên YouTube, Bieber đã ký hợp đồng với RBMG Records vào năm 2008.', N'justinbieber.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (6, N'Maroon 5', N'Maroon 5 là một ban nhạc pop rock người Mỹ đến từ Los Angeles, California. Nổi tiếng từ năm 2004 sau single "This Love", sự nghiệp của Maroon 5 liên tục có những bước tiến vững chắc.', N'maroon5.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (7, N'Shawn Mendes', N'Shawn Peter Raul Mendes là một ca sĩ, nhạc sĩ người Canada. Anh bắt đầu được mọi người chú ý vào năm 2013, khi anh đăng những bài hát cover lên mạng xã hội Vine.', N'shawnmendes.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (8, N'Adele', N'Adele Laurie Blue Adkins MBE là một ca sĩ, nhạc sĩ người Anh. Adele được đề nghị ký hợp đồng thu âm với hãng thu âm XL Recordings sau khi một người bạn của Adele đăng một bản demo của cô lên Myspace vào năm 2006.', N'adele.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (9, N'Martin Garrix', N'Martijn Gerard Garritsen, được biết đến với nghệ danh là Martin Garrix là một DJ, nhạc sĩ, kiêm nhà sản xuất người Hà Lan. Anh đứng thứ nhất trong danh sách 100 DJ hàng đầu của DJ Mag năm 2016 và cũng là người trẻ tuổi nhất được trao danh hiệu này.', N'martingarrix.jpg')
GO
INSERT [dbo].[Singer] ([SingerID], [SingerName], [Background], [SingerImage]) VALUES (10, N'Sia', N'Sia Kate Isobelle Furler, hay thường được biết đến với cái tên ngắn gọn là Sia, là một ca sĩ kiêm sáng tác nhạc, nhà sản xuất thu âm và đạo diễn video âm nhạc người Úc.', N'sia.jpg')
GO
SET IDENTITY_INSERT [dbo].[Singer] OFF
GO
SET IDENTITY_INSERT [dbo].[SongPerformedBy] ON 

GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (1, 2, 1)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (2, 3, 2)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (3, 3, 3)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (4, 3, 4)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (5, 3, 5)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (6, 3, 6)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (7, 3, 7)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (9, 3, 9)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (10, 3, 10)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (11, 1, 11)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (12, 3, 12)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (13, 2, 13)
GO
INSERT [dbo].[SongPerformedBy] ([songPerformance], [SingerID], [SongID]) VALUES (14, 1, 14)
GO
SET IDENTITY_INSERT [dbo].[SongPerformedBy] OFF
GO
SET IDENTITY_INSERT [dbo].[MVPerformedBy] ON 

GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (1, 1, 1)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (2, 1, 2)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (3, 1, 3)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (4, 2, 4)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (5, 2, 5)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (6, 2, 6)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (7, 2, 7)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (8, 2, 8)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (9, 2, 9)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (10, 3, 10)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (11, 3, 11)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (12, 3, 12)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (13, 3, 13)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (14, 3, 14)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (15, 3, 15)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (16, 3, 16)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (17, 3, 17)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (18, 3, 18)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (19, 4, 19)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (20, 4, 20)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (21, 4, 21)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (22, 4, 22)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (23, 5, 23)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (24, 5, 24)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (25, 5, 25)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (26, 6, 26)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (27, 6, 27)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (28, 6, 28)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (29, 6, 29)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (30, 6, 30)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (31, 6, 31)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (32, 6, 32)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (33, 6, 33)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (34, 6, 34)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (35, 7, 35)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (36, 7, 36)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (37, 7, 37)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (38, 8, 38)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (39, 8, 39)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (40, 8, 40)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (41, 9, 41)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (42, 9, 42)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (43, 9, 43)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (44, 10, 44)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (45, 10, 45)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (46, 10, 46)
GO
INSERT [dbo].[MVPerformedBy] ([mvPerformance], [SingerID], [MVID]) VALUES (47, 10, 47)
GO
SET IDENTITY_INSERT [dbo].[MVPerformedBy] OFF
GO
