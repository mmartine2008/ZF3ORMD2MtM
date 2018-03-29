Use gestor;

CREATE TABLE [dbo].[localidad](
	[idLocalidad] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NULL,
 CONSTRAINT [pk_localidad] PRIMARY KEY CLUSTERED 
(
	[idLocalidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];

CREATE TABLE [dbo].[persona](
	[idPersona] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NULL,
        
 CONSTRAINT [pk_persona] PRIMARY KEY CLUSTERED 
(
	[idPersona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];


ALTER TABLE dbo.persona ADD idLocalidad INTEGER;

ALTER TABLE [dbo].[persona]  WITH CHECK 
ADD  CONSTRAINT [FK_persona_localidad] FOREIGN KEY([idLocalidad])
REFERENCES [dbo].[localidad] ([idLocalidad]);


CREATE TABLE [dbo].[proyecto](
	[idProyecto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NULL,
 CONSTRAINT [pk_proyecto] PRIMARY KEY CLUSTERED 
(
	[idProyecto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];

CREATE TABLE [dbo].[personaproyecto](
	[idPersonaProyecto] [int] IDENTITY(1,1) NOT NULL
 CONSTRAINT [pk_personaProyecto] PRIMARY KEY CLUSTERED 
(
	[idPersonaProyecto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];


CREATE TABLE [dbo].[personaproyecto](
	[idPersonaProyecto] [int] IDENTITY(1,1) NOT NULL
 CONSTRAINT [pk_personaProyecto] PRIMARY KEY CLUSTERED 
(
	[idPersonaProyecto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY];

ALTER TABLE dbo.personaproyecto ADD idPersona INTEGER;

ALTER TABLE [dbo].[personaproyecto]  WITH CHECK 
ADD  CONSTRAINT [FK_personaproyecto_persona] FOREIGN KEY([idPersona])
REFERENCES [dbo].[persona] ([idPersona]);


ALTER TABLE dbo.personaproyecto ADD idProyecto INTEGER;

ALTER TABLE [dbo].[personaproyecto]  WITH CHECK 
ADD  CONSTRAINT [FK_personaproyecto_proyecto] FOREIGN KEY([idProyecto])
REFERENCES [dbo].[proyecto] ([idProyecto]);


INSERT INTO localidad (nombre) VALUES ('Tandil');
INSERT INTO localidad (nombre) VALUES ('Necochea');
INSERT INTO localidad (nombre) VALUES ('Olavarria');

INSERT INTO persona (nombre, idLocalidad) VALUES ('Juan', 1);
INSERT INTO persona (nombre, idLocalidad) VALUES ('Pedro', 1);
INSERT INTO persona (nombre, idLocalidad) VALUES ('Pablo', 2);
INSERT INTO persona (nombre, idLocalidad) VALUES ('Mateo', 2);
INSERT INTO persona (nombre, idLocalidad) VALUES ('Lucas', 3);

INSERT INTO proyecto (nombre) VALUES ('ALFA');
INSERT INTO proyecto (nombre) VALUES ('BETA');
INSERT INTO proyecto (nombre) VALUES ('GAMA');


 
