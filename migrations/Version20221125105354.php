<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125105354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_player DROP FOREIGN KEY FK_1EE00FAA126F525E');
        $this->addSql('ALTER TABLE item_player DROP FOREIGN KEY FK_1EE00FAA99E6F5DF');
        $this->addSql('ALTER TABLE item_role DROP FOREIGN KEY FK_9F59CE91126F525E');
        $this->addSql('ALTER TABLE item_role DROP FOREIGN KEY FK_9F59CE91D60322AC');
        $this->addSql('ALTER TABLE raid_player DROP FOREIGN KEY FK_ABCBEEB699E6F5DF');
        $this->addSql('ALTER TABLE raid_player DROP FOREIGN KEY FK_ABCBEEB69C55ABC9');
        $this->addSql('DROP TABLE item_player');
        $this->addSql('DROP TABLE item_role');
        $this->addSql('DROP TABLE raid_player');
        $this->addSql('ALTER TABLE event_player DROP is_bench');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E9C55ABC9');
        $this->addSql('DROP INDEX IDX_1F1B251E9C55ABC9 ON item');
        $this->addSql('ALTER TABLE item ADD slug VARCHAR(64) NOT NULL, DROP raid_id');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65D60322AC');
        $this->addSql('DROP INDEX IDX_98197A65D60322AC ON player');
        $this->addSql('ALTER TABLE player ADD slug VARCHAR(64) NOT NULL, DROP role_id');
        $this->addSql('ALTER TABLE raid ADD slug VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE role ADD slug VARCHAR(64) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_player (item_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_1EE00FAA126F525E (item_id), INDEX IDX_1EE00FAA99E6F5DF (player_id), PRIMARY KEY(item_id, player_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE item_role (item_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_9F59CE91D60322AC (role_id), INDEX IDX_9F59CE91126F525E (item_id), PRIMARY KEY(item_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE raid_player (raid_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_ABCBEEB69C55ABC9 (raid_id), INDEX IDX_ABCBEEB699E6F5DF (player_id), PRIMARY KEY(raid_id, player_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE item_player ADD CONSTRAINT FK_1EE00FAA126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_player ADD CONSTRAINT FK_1EE00FAA99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_role ADD CONSTRAINT FK_9F59CE91126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_role ADD CONSTRAINT FK_9F59CE91D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE raid_player ADD CONSTRAINT FK_ABCBEEB699E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE raid_player ADD CONSTRAINT FK_ABCBEEB69C55ABC9 FOREIGN KEY (raid_id) REFERENCES raid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_player ADD is_bench TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE item ADD raid_id INT NOT NULL, DROP slug');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E9C55ABC9 FOREIGN KEY (raid_id) REFERENCES raid (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E9C55ABC9 ON item (raid_id)');
        $this->addSql('ALTER TABLE player ADD role_id INT NOT NULL, DROP slug');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_98197A65D60322AC ON player (role_id)');
        $this->addSql('ALTER TABLE raid DROP slug');
        $this->addSql('ALTER TABLE role DROP slug');
    }
}
