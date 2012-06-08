-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 15, 2011 at 06:00 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `astolfo`
-- 

-- 
-- Dumping data for table `asset`
-- 

INSERT INTO `asset` VALUES (1, 1, 2, 1, NULL, 'Doctrine Video Tutorial', NULL, NULL, 0, 0, NULL, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'doctrine-video-tutorial');
INSERT INTO `asset` VALUES (2, 2, 2, 1, NULL, 'Doctrine Cheat Sheet', NULL, NULL, 0, 0, NULL, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'doctrine-cheat-sheet');

-- 
-- Dumping data for table `asset_answer`
-- 


-- 
-- Dumping data for table `asset_audio`
-- 


-- 
-- Dumping data for table `asset_audio_gallery`
-- 


-- 
-- Dumping data for table `asset_broadcast`
-- 


-- 
-- Dumping data for table `asset_content`
-- 

INSERT INTO `asset_content` VALUES (1, 1, 'Chamada asd fasd fsdafsda', 'Chamada Curta', 'Chamada Longa', 'Chamada Longa', 'Fonte', 'Fulano de Tal');

-- 
-- Dumping data for table `asset_episode`
-- 


-- 
-- Dumping data for table `asset_event`
-- 


-- 
-- Dumping data for table `asset_file`
-- 


-- 
-- Dumping data for table `asset_image`
-- 


-- 
-- Dumping data for table `asset_image_gallery`
-- 


-- 
-- Dumping data for table `asset_link`
-- 


-- 
-- Dumping data for table `asset_poll`
-- 


-- 
-- Dumping data for table `asset_question`
-- 


-- 
-- Dumping data for table `asset_questionnaire`
-- 


-- 
-- Dumping data for table `asset_season`
-- 


-- 
-- Dumping data for table `asset_tweet`
-- 


-- 
-- Dumping data for table `asset_tweet_monitor`
-- 


-- 
-- Dumping data for table `asset_type`
-- 

INSERT INTO `asset_type` VALUES (1, 'Conteúdo', NULL, 'Content', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'content');
INSERT INTO `asset_type` VALUES (2, 'Imagem', NULL, 'Image', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'image');
INSERT INTO `asset_type` VALUES (3, 'Galeria de Imagens', NULL, 'ImageGallery', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'image-gallery');
INSERT INTO `asset_type` VALUES (4, 'Áudio', NULL, 'Audio', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'audio');
INSERT INTO `asset_type` VALUES (5, 'Galeria de Áudios (Podcasts)', NULL, 'AudioGallery', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'audio-gallery');
INSERT INTO `asset_type` VALUES (6, 'Vídeo', NULL, 'Video', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'video');
INSERT INTO `asset_type` VALUES (7, 'Galeria de Vídeos', NULL, 'VideoGallery', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'video-gallery');
INSERT INTO `asset_type` VALUES (8, 'File', NULL, 'File', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'file');
INSERT INTO `asset_type` VALUES (9, 'Questionario', NULL, 'Questionnaire', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'questionnaire');
INSERT INTO `asset_type` VALUES (10, 'Pergunta', NULL, 'Question', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'question');
INSERT INTO `asset_type` VALUES (11, 'Resposta', NULL, 'Answer', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'answer');
INSERT INTO `asset_type` VALUES (12, 'Transmissão', NULL, 'Broadcast', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'broadcast');
INSERT INTO `asset_type` VALUES (13, 'Câmera', NULL, 'Cam', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'cam');
INSERT INTO `asset_type` VALUES (14, 'Temporada', NULL, 'Season', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'season');
INSERT INTO `asset_type` VALUES (15, 'Episódio', NULL, 'Episode', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'episode');
INSERT INTO `asset_type` VALUES (16, 'Evento', NULL, 'Event', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'event');
INSERT INTO `asset_type` VALUES (17, 'Link', NULL, 'Link', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'link');
INSERT INTO `asset_type` VALUES (18, 'Tweet', NULL, 'Tweet', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'tweet');
INSERT INTO `asset_type` VALUES (19, 'Monitor do Twitter', NULL, 'TweetMonitor', 0, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'tweet-monitor');

-- 
-- Dumping data for table `asset_video`
-- 


-- 
-- Dumping data for table `asset_video_gallery`
-- 


-- 
-- Dumping data for table `asset_vote`
-- 


-- 
-- Dumping data for table `block`
-- 


-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (1, NULL, 'Educação', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'educacao');
INSERT INTO `category` VALUES (2, NULL, 'Música', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'musica');

-- 
-- Dumping data for table `category_asset`
-- 

INSERT INTO `category_asset` VALUES (1, 1);
INSERT INTO `category_asset` VALUES (1, 2);

-- 
-- Dumping data for table `channel`
-- 

INSERT INTO `channel` VALUES (1, 1, 'TV Cultura', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'tv-cultura');
INSERT INTO `channel` VALUES (2, 1, 'TV RáTimBum', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'tv-ratimbum');
INSERT INTO `channel` VALUES (3, 1, 'Univesp TV', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'univesp-tv');
INSERT INTO `channel` VALUES (4, 1, 'MultiCultura', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'multicultura');
INSERT INTO `channel` VALUES (5, 1, 'Rádio Cultura Brasil', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'radio-cultura-brasil');
INSERT INTO `channel` VALUES (6, 1, 'Rádio Cultura FM', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'radio-cultura-fm');

-- 
-- Dumping data for table `channel_program`
-- 

INSERT INTO `channel_program` VALUES (1, 1);
INSERT INTO `channel_program` VALUES (1, 2);
INSERT INTO `channel_program` VALUES (3, 2);

-- 
-- Dumping data for table `display`
-- 


-- 
-- Dumping data for table `image_usage`
-- 

INSERT INTO `image_usage` VALUES (1, 'Default', 'Default', 310, 186, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'default');
INSERT INTO `image_usage` VALUES (2, 'Thumbnail', 'Thumbnail', 90, 54, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'thumbnail');
INSERT INTO `image_usage` VALUES (3, 'Image 1', 'Imagem com 1 coluna de largura', 90, 54, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-1');
INSERT INTO `image_usage` VALUES (4, 'Image 2', 'Imagem com 2 colunas de largura', 200, 120, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-2');
INSERT INTO `image_usage` VALUES (5, 'Image 3', 'Imagem com 3 colunas de largura', 310, 186, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-3');
INSERT INTO `image_usage` VALUES (6, 'Image 4', 'Imagem com 4 colunas de largura', 420, 252, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-4');
INSERT INTO `image_usage` VALUES (7, 'Image 5', 'Imagem com 5 colunas de largura', 530, 318, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-5');
INSERT INTO `image_usage` VALUES (8, 'Image 6', 'Imagem com 6 colunas de largura', 640, 384, 1, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-6');
INSERT INTO `image_usage` VALUES (9, 'Image 1 b', 'Imagem com 1 coluna de largura', 90, 54, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-1-b');
INSERT INTO `image_usage` VALUES (10, 'Image 2 b', 'Imagem com 2 colunas de largura', 200, 120, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-2-b');
INSERT INTO `image_usage` VALUES (11, 'Image 3 b', 'Imagem com 3 colunas de largura', 310, 186, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-3-b');
INSERT INTO `image_usage` VALUES (12, 'Image 4 b', 'Imagem com 4 colunas de largura', 420, 252, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-4-b');
INSERT INTO `image_usage` VALUES (13, 'Image 5 b', 'Imagem com 5 colunas de largura', 530, 318, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-5-b');
INSERT INTO `image_usage` VALUES (14, 'Image 6 b', 'Imagem com 6 colunas de largura', 640, 384, 0, NULL, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'image-6-b');

-- 
-- Dumping data for table `organization`
-- 

INSERT INTO `organization` VALUES (1, 'FPA', 'Blah blah blah blah blah blah blah blah blah blah', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'fpa');

-- 
-- Dumping data for table `person`
-- 


-- 
-- Dumping data for table `person_asset`
-- 


-- 
-- Dumping data for table `program`
-- 

INSERT INTO `program` VALUES (1, '', 'Roda Viva', 'Blah blah blah blah blah blah blah blah blah blah', NULL, NULL, NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'roda-viva');
INSERT INTO `program` VALUES (2, '', 'Jornal da Cultura', 'Blah blah blah blah blah blah blah blah blah blah', NULL, NULL, NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'jornal-da-cultura');

-- 
-- Dumping data for table `related_asset`
-- 


-- 
-- Dumping data for table `schedule`
-- 

INSERT INTO `schedule` VALUES (1, 1, 1, '', 'Roda Viva entrevista o peixinho Nemo', 'Não perca! Com exclusividade Nemo irá falar sobre as dificuldades de sobreviver no mar sozinho', '2010-12-23 22:00:00', '2010-12-23 23:30:00', 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'roda-viva-entrevista-o-peixinho-nemo');

-- 
-- Dumping data for table `section`
-- 

INSERT INTO `section` VALUES (1, NULL, 1, 'Home Page', 'Homepage da TV Cultura', NULL, 0, 1, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'home-page');
INSERT INTO `section` VALUES (2, NULL, 2, 'Home Page', 'Homepage do Roda Viva', NULL, 0, 1, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'home-page-1');
INSERT INTO `section` VALUES (3, NULL, 2, 'Programas', 'Programas do Roda Viva', NULL, 0, 1, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'programas');
INSERT INTO `section` VALUES (4, NULL, 2, 'Contato', 'Contato do Roda Viva', NULL, 0, 1, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'contato');
INSERT INTO `section` VALUES (5, NULL, 3, 'Home Page', 'Homepage do JC', NULL, 0, 1, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'home-page-2');
INSERT INTO `section` VALUES (6, NULL, 3, 'Programas', 'Programas do JC', NULL, 0, 1, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'programas-1');
INSERT INTO `section` VALUES (7, NULL, 3, 'Contato', 'Contato do JC', NULL, 0, 1, '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'contato-1');

-- 
-- Dumping data for table `section_asset`
-- 


-- 
-- Dumping data for table `section_user`
-- 

INSERT INTO `section_user` VALUES (1, 1, 1, '', NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `section_user` VALUES (2, 1, 2, '', NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `section_user` VALUES (3, 2, 1, '', NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `section_user` VALUES (4, 2, 2, '', NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `section_user` VALUES (5, 3, 1, '', NULL, 0, '2011-02-15 17:57:56', '2011-02-15 17:57:56');
INSERT INTO `section_user` VALUES (6, 3, 2, '', NULL, 0, '2011-02-15 17:57:56', '2011-02-15 17:57:56');
INSERT INTO `section_user` VALUES (7, 3, 3, '', NULL, 0, '2011-02-15 17:57:56', '2011-02-15 17:57:56');

-- 
-- Dumping data for table `sf_guard_forgot_password`
-- 


-- 
-- Dumping data for table `sf_guard_group`
-- 

INSERT INTO `sf_guard_group` VALUES (1, 'admin', 'Administrator group', '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group` VALUES (2, 'editor', 'Editor group', '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group` VALUES (3, 'collaborator', 'Collaborator group', '2011-02-15 17:57:55', '2011-02-15 17:57:55');

-- 
-- Dumping data for table `sf_guard_group_permission`
-- 

INSERT INTO `sf_guard_group_permission` VALUES (1, 1, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group_permission` VALUES (1, 2, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group_permission` VALUES (1, 3, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group_permission` VALUES (2, 2, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group_permission` VALUES (2, 3, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_group_permission` VALUES (3, 3, '2011-02-15 17:57:55', '2011-02-15 17:57:55');

-- 
-- Dumping data for table `sf_guard_permission`
-- 

INSERT INTO `sf_guard_permission` VALUES (1, 'admin', 'Administrator permission', '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_permission` VALUES (2, 'editor', 'Editor permission', '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_permission` VALUES (3, 'collaborator', 'Collaborator permission', '2011-02-15 17:57:55', '2011-02-15 17:57:55');

-- 
-- Dumping data for table `sf_guard_remember_key`
-- 


-- 
-- Dumping data for table `sf_guard_user`
-- 

INSERT INTO `sf_guard_user` VALUES (1, 'Emerson', 'Estrella', 'edse@edse.com', 'edse', 'sha1', '4192883b3c1d9a1f08c2a8b1ca36b599', '9fbd84f688d0b2090fc74c223292d62799713c8d', 1, 1, NULL, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_user` VALUES (2, 'Editor', 'X', 'editor@editor.com', 'editor', 'sha1', 'b241a2b27b1b1b3d4c8cab22906070b7', 'b878828e4e33244b1e9ee59d24ca352bde84c963', 1, 0, NULL, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_user` VALUES (3, 'Colaborador', 'X', 'colaborador@colaborador.com', 'colaborador', 'sha1', '230916dba98fb7a588342464b507b65f', '561fc75d62a86d9c367d8b379deba75867768f89', 1, 0, NULL, '2011-02-15 17:57:55', '2011-02-15 17:57:55');

-- 
-- Dumping data for table `sf_guard_user_group`
-- 

INSERT INTO `sf_guard_user_group` VALUES (1, 1, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_user_group` VALUES (2, 2, '2011-02-15 17:57:55', '2011-02-15 17:57:55');
INSERT INTO `sf_guard_user_group` VALUES (3, 3, '2011-02-15 17:57:55', '2011-02-15 17:57:55');

-- 
-- Dumping data for table `sf_guard_user_permission`
-- 


-- 
-- Dumping data for table `site`
-- 

INSERT INTO `site` VALUES (1, NULL, 'TV Cultura', 'Blah blah blah blah blah blah blah blah blah blah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'tv-cultura');
INSERT INTO `site` VALUES (2, NULL, 'Roda Viva', 'Blah blah blah blah blah blah blah blah blah blah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'roda-viva');
INSERT INTO `site` VALUES (3, NULL, 'Jornal da Cultura', 'Blah blah blah blah blah blah blah blah blah blah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2011-02-15 17:57:55', '2011-02-15 17:57:55', 'jornal-da-cultura');

-- 
-- Dumping data for table `site_user`
-- 


-- 
-- Dumping data for table `tag`
-- 

INSERT INTO `tag` VALUES (1, 'Emerson Estrella', NULL, NULL, NULL, NULL);
INSERT INTO `tag` VALUES (2, 'Web', NULL, NULL, NULL, NULL);
INSERT INTO `tag` VALUES (3, 'Developer', NULL, NULL, NULL, NULL);
INSERT INTO `tag` VALUES (4, 'Web Developer', NULL, NULL, NULL, NULL);

-- 
-- Dumping data for table `tagging`
-- 


-- 
-- Dumping data for table `todo`
-- 

INSERT INTO `todo` VALUES (1, NULL, 1, NULL, 1, 'Adicionar metadados no asset: Blah blah blah', 'Adicionar metadados no asset: Blah blah blah', 'Pendding', '2011-02-15 17:57:56', '2011-02-15 17:57:56', 'adicionar-metadados-no-asset-blah-blah-blah');

-- 
-- Dumping data for table `video_dropbox`
-- 

