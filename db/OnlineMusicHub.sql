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
