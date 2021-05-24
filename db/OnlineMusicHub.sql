create database OnlineMusicHub;
use OnlineMusicHub;
--select DB_NAME()

create table Account (
	AccountID int primary key,
	Username nvarchar(15),
	--HashedPassword varbinary(max)
	HashedPassword nvarchar(max),
	AvatarLink varchar(max),
	isAdmin bit
);


create table Song(
	SongID int primary key,
	SongTitle nvarchar(30),
	Genre nvarchar(60),
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

--Track is a song belongs to an account
create table Track(
	TrackID int primary key,
	SongID int,
	AccountID int,

	foreign key (SongID) references Song(SongID) 
	on delete cascade on update cascade,
	foreign key (AccountID) references Account(AccountID) 
	on delete cascade on update cascade,
);

create table Singer(
	SingerID int primary key,
	SingerName nvarchar(30),
	BirthYear nvarchar(10),
	Background nvarchar(max),
	SingerImage nvarchar(250)
);

create table SongPerformedBy(
	songPerformance int primary key,
	SingerID int,
	SongID int,

	foreign key (SingerID) references Singer(SingerID) 
	on delete cascade on update cascade,
	foreign key (SongID) references Song(SongID) 
	on delete cascade on update cascade
);

create table MVPerformedBy(
	mvPerformance int primary key,
	SingerID int,
	MVID int,

	foreign key (SingerID) references Singer(SingerID) 
	on delete cascade on update cascade,
	foreign key (MVID) references MV(MVID) 
	on delete cascade on update cascade
);

----drop table Account;
----drop table Song;
----drop table Track;
----drop table Singer;
----drop table PerformedBy;


--#################################################################################


--go
--create procedure AddUser
--	@pAccountID int = 0,
--	@pUsername nvarchar(15) = NULL,
--	@pPassword nvarchar(30) = NULL,
--	@pAvatarLink varchar(max) = NULL,
--	@pIsAdmin bit,
--	@responseMessage nvarchar(250) output
--as
--begin
--	set nocount on

--	begin try
--		insert into Account (AccountID, Username, HashedPassword, AvatarLink, isAdmin)
--		values (@pAccountID, @pUsername, hashbytes('SHA2_256', @pPassword), @pAvatarLink, @pIsAdmin);
		
--		set @responseMessage = 'Successfully inserted into table Account.';
--	end try

--	begin catch
--		set @responseMessage = error_message();
--	end catch
--end
----drop procedure AddUser

--go
--declare @responseMessage nvarchar(250)
--exec AddUser
--	@pAccountID = 123, 
--	@pUsername = 'admin',
--	@pPassword = 'admin',
--	@pAvatarLink = 'https://www.clipartmax.com/png/middle/319-3191274_male-avatar-admin-profile.png',
--	@pIsAdmin = 1,
--	@responseMessage = @responseMessage OUTPUT;

--go
--declare @responseMessage nvarchar(250)
--exec AddUser
--	@pAccountID = 124, 
--	@pUsername = 'edwin carousel',
--	@pPassword = '123@123',
--	@pAvatarLink = 'https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png',
--	@pIsAdmin = 0,
--	@responseMessage = @responseMessage OUTPUT;

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


--go
--if object_id('HashString', 'P') is not NULL
--	drop procedure HashString;
--go
--create procedure HashString
--	@string nvarchar(30) = NULL,
--	@hashedString varbinary(max) output
--as
--begin
--	set nocount on;
--	set @hashedString = HASHBYTES('SHA2_256', @string);
--return
--end
----drop procedure HashString

--declare @testHashedString as varbinary(max);
--exec HashString
--	@string = 'admin',
--	@hashedString = @testHashedString output
--print @testHashedString


--#################################################################################


select * from Account;
delete from Account;
select 1
select Username from Account where HashedPassword = '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918';