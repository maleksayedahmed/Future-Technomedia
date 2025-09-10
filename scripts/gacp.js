#!/usr/bin/env node
import readline from 'node:readline';
import { spawnSync } from 'node:child_process';

function run(command, args) {
  const result = spawnSync(command, args, { stdio: 'inherit', shell: false });
  if (result.status !== 0) {
    process.exit(result.status ?? 1);
  }
}

function prompt(question) {
  const rl = readline.createInterface({ input: process.stdin, output: process.stdout });
  return new Promise((resolve) => rl.question(question, (answer) => {
    rl.close();
    resolve(answer);
  }));
}

async function main() {
  const argMessage = process.argv.slice(2).join(' ').trim();
  const commitMessage = argMessage || (await prompt('Commit message: ')).trim();

  if (!commitMessage) {
    console.error('Aborted: commit message is required.');
    process.exit(1);
  }

  run('git', ['add', '.']);

  const commit = spawnSync('git', ['commit', '-m', commitMessage], { stdio: 'inherit', shell: false });
  if (commit.status !== 0) {
    // If nothing to commit, continue to push anyway
    const stderr = commit.stderr?.toString() ?? '';
    const stdout = commit.stdout?.toString() ?? '';
    const text = `${stdout}\n${stderr}`;
    const noChanges = text.includes('nothing to commit') || text.includes('no changes added to commit');
    if (!noChanges) {
      process.exit(commit.status ?? 1);
    }
  }

  run('git', ['push']);
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});


